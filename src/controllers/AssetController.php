<?php namespace Lotsofcode\Slurp;

use App, Response, Controller;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class AssetController extends Controller
{
	/**
	 * Returns a file in the assets directory
	 * 
	 * @return \Illuminate\Support\Facades\Response
	 */
	public function file($path)
	{
		$absolutePath = Slurp::isJavascript($path);
		if ($absolutePath) {
			return $this->javascript($absolutePath);
		}

		App::abort(404);
	}

	/*
	 * Returns a javascript file for the given path.
	 * 
	 * @return \Illuminate\Support\Facades\Response
	 */
	private function javascript($path)
	{
		$response = Response::make(Slurp::javascript($path), 200);

		$response->header('Content-Type', 'application/javascript');

		return $response;
	}
}