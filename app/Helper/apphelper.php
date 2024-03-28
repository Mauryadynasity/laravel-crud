<?php

function UploadBlobImages($file, $folder_name) {

	if ($file) {
		$path = public_path('uploads/' . $folder_name);
		if (!File::isDirectory($path)) {
			File::makeDirectory($path, 0777, true, true);
		}

		$imag_name = substr(uniqid(1), -4) . time() . '.png';
		$img = str_replace('data:image/png;base64,', '', $file);
		$img = str_replace(' ', '+', $img);
		$data = base64_decode($img);
		file_put_contents($path . '/' . $imag_name, $data);

		return $imag_name;
	}
	return null;
}

function UplaodImages($file, $folder_name, $type = null) {
	if ($file) {
		$path = public_path('uploads/' . $folder_name);
		if (!File::isDirectory($path)) {
			File::makeDirectory($path, 0777, true, true);
		}

		$data['document'] = substr(uniqid(1), -4) . time() . '.' . $file->getClientOriginalExtension();
		// $destinationPath = public_path('uploads/document');
		$file->move($path, $data['document']);
		if ($type) {
			return array('name' => $data['document'], 'type' => $file->getClientOriginalExtension());
		}
		return $data['document'];
	}
}


function MultipleUplaodImages($file, $folder_name, $id = null, $key = 'campaign_id') {

	if ($file) {
		$path = public_path('uploads/' . $folder_name);

		if (!File::isDirectory($path)) {
			File::makeDirectory($path, 0777, true, true);
		}

		foreach ($file as $key => $files) {

			$name = substr(uniqid(1), -4) . time() . '.' . $files->extension();
			$files->move($path, $name);
			if ($id) {

				$data[$key] = array(
					'image' => $name,
					'event_id' => $id,
					'created_at' => date('Y-m-d H:i:s'),
				);
			} else {
				$data[$key] = $name;
			}
		}
	}

	return $data;

}

function MultipleUplaodImagescam($file, $folder_name, $id = null, $key = 'campaign_id') {

	if ($file) {
		$path = public_path('uploads/' . $folder_name);

		if (!File::isDirectory($path)) {
			File::makeDirectory($path, 0777, true, true);
		}

		foreach ($file as $key => $files) {

			$name = substr(uniqid(1), -4) . time() . '.' . $files->extension();
			$files->move($path, $name);
			if ($id) {

				$data[$key] = array(
					'image' => $name,
					'campaign_id' => $id,
					'created_at' => date('Y-m-d H:i:s'),
				);
			} else {
				$data[$key] = $name;
			}
		}
	}

	return $data;

}
