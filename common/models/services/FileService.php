<?php

namespace common\models\services;

use common\models\db\Files;

use Imagick;
use Exception;
use Yii;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;

/**
 * Сервис для работы с файлами
 * @package common\models\service
 * @author Maxim Podberezhskiy
 */
class FileService
{
	/**
	 * Папка в которой будет хранится файлы
	 */
	const BASE_DIR = '/web/';

	/**
	 * Кол-во символов в подпапке
	 */
	const COUNT_SYMBOLS_IN_SUBDIR = 3;

	private const PREV = 'prev.jpg';
	/**
	 * Сохранение файла на сервере и в БД
	 *
	 * @param UploadedFile $file
	 *
	 * @return bool|Files
	 * @author Maxim Podberezhskiy
	 */
	public function save(UploadedFile $file, $deleteTempFile = true)
	{
		$transaction = Yii::$app->db->beginTransaction();

		$result = false;

		$dir = $this->generateSubDir(Files::DIR_UPLOAD);

		$fileName = $this->generateName($file->name);

		$model = new Files();

		$model->name          = $fileName . '.' . $file->extension;
		$model->size          = $file->size;
		$model->original_name = $file->name;
		$model->dir           = $dir;

		$file->name = $fileName;

		$savePath = static::getUploadDir() . $dir . '/' . $model->name;

		if (true === $model->save() && true === $file->saveAs($savePath, $deleteTempFile)) {
			$result = $model;
			$transaction->commit();
		} else {
			$transaction->rollBack();
		}

		$file->name = $model->original_name; //вернем исходное название

		return $result;
	}

	/**
	 * Генерация директории где будет хранится файл
	 * @param string $parent_dir - родительская папка
	 * @return string
	 * @author Maxim Podberezhskiy
	 */
	public function generateSubDir(string $parent_dir): string
	{
		$dir = mb_strtolower(Yii::$app->security->generateRandomString(static::COUNT_SYMBOLS_IN_SUBDIR));

		FileHelper::createDirectory(static::getUploadDir() . $parent_dir . '/' . $dir, 0777);

		return $dir;
	}

	/**
	 * @param string $file_name
	 *
	 * @return string
	 * @author Maxim Podberezhskiy
	 */
	private function generateName(string $file_name): string
	{
		return md5(rand(0, 2000) . $file_name . microtime());
	}

	/**
	 * @return string
	 * @author Maxim Podberezhskiy
	 */
	public static function getUploadDir(): string
	{
		return Yii::getAlias('@frontend') . static::BASE_DIR;
	}

	/**
	 * @param Files $model
	 *
	 * @return string
	 * @author Maxim Podberezhskiy
	 */
	public static function getPath(Files $model): string
	{
		$result = '';

		$file = implode('/', [static::getUploadDir(), $model->dir, $model->name]);

		if (true === file_exists($file)) {
			$result = implode('/', [Yii::$app->params['sites']['storage'], $model->dir, $model->name]);
		}

		return $result;
	}

	/**
	 * @param string $file_id
	 *
	 * @return string
	 * @author Maxim Podberezhskiy
	 */
	public static function getById(string $file_id = null): string
	{
		if ($file_id != null) {
			return static::getPath(Files::findOne([Files::ATTR_ID => $file_id]));
		}
		return '';
	}

	/**
	 * @param Files $model
	 *
	 * @return string
	 * @author Maxim Podberezhskiy
	 */
	public static function getRealPath(Files $model): string
	{
		return implode('/', [
			realpath(self::getUploadDir()),
			$model->dir,
			$model->name
		]);
	}

	/**
	 * Получение модели Files
	 *
	 * @param string|null $file_id
	 * @return Files|null
	 * @author Maxim Podberezhskiy
	 */
	public static function getFilesModel(string $file_id = null): ?Files
	{
		$model = $file_id
			? Files::findOne($file_id)
			: null;
		return $model;
	}

	/**
	 * Генерация превью файла
	 * @param Files $file
	 * @return string|string[]
	 * @throws \ImagickException
	 * @author Maxim Podberezhskiy
	 */
	public static function generatePrevImg(Files $file): array|string
	{
		//Директория где лежит файл
		$file_dir = implode('/', [
			realpath(static::getUploadDir()),
			$file->dir . '/'
		]);

		//Заглушка
		$result = '';

		try {
			if (!class_exists('Imagick')) {
				throw new Exception(
					sprintf('Class %s does not exist', 'Imagick')
				);
			}
			//Проверка на файлы, где можно впихнуть превью
			if (in_array(self::getExtension($file->name), ['jpg','jpeg','png','pdf'])) {
				//Если нет превью в папке, то генерим
				if (!is_file($file_dir . static::PREV)) {
					$im = new Imagick();
					$im->readImage( $file_dir . $file->name . '[0]'  );//[0] - это первая страница если пдф
					//Делаем многостраничные пдф или белые пдф не черными
					$im->mergeImageLayers(Imagick::LAYERMETHOD_FLATTEN);
					$im->setImageAlphaChannel(Imagick::ALPHACHANNEL_REMOVE);

					$im->setImageFormat('jpeg');
					//210пх оптимально для превью файла
					$im->resizeImage(0, 210, 0, 1);
					$im->writeImage($file_dir . static::PREV);
					$im->clear();
					$im->destroy();
				}
				//Так как превью лежит там же где файл и превью НЕТ в бд, заменим в урле название на prev
				$result = str_replace($file->name, static::PREV, FileService::getPath($file));
			}
		} catch (Exception $e){
			//Если отпадет имагик, будет заглушка
			return $result;
		}

		return $result;
	}

	/**
	 * Получим формат файла
	 * @param $str
	 * @return string
	 * @author Maxim Podberezhskiy
	 */
	private static function getExtension($str): string
	{
		$array = explode('.', $str);

		return strtolower(end($array));
	}
}