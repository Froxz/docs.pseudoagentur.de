<?php namespace App\Http\Controllers;

use App\Documentation;
use Symfony\Component\DomCrawler\Crawler;

class DocsController extends Controller {

	/**
	 * The documentation repository.
	 *
	 * @var Documentation
	 */
	protected $docs;

	/**
	 * Create a new controller instance.
	 *
	 * @param  Documentation  $docs
	 * @return void
	 */
	public function __construct(Documentation $docs)
	{
		$this->docs = $docs;
	}

	/**
	 * Show the root documentation page (/docs).
	 *
	 * @return Response
	 */
	public function showRootPage()
	{
		return redirect(DEFAULT_VERSION."/".DEFAULT_PAGE_DIR."/".DEFAULT_PAGE);
	}

	/**
	 * Show a documentation page.
	 *
	 * @return Response
	 */

	public function showDir($version, $directory = null, $page = null ) {
		return $this->show($version, $page, $directory);
	}

	public function show($version, $directory = null, $page = null)
	{

		if ( ! $this->isVersion($version)) {
			return redirect(DEFAULT_VERSION.'/'.$version, 301);
		}

		if( is_null($page) ) {
			$page 		= DEFAULT_PAGE;
			$directory 	= DEFAULT_PAGE_DIR;
		}		

		$content = $this->docs->get($version, $page, $directory);
		
		if (is_null($content)) {
			abort(404);
		}

		$title = (new Crawler($content))->filterXPath('//h1');
		
		$section = '';

		if ($this->docs->sectionExists($version, $page, $directory)) {
			$page = ( !is_null($directory) ) ? $directory."/".$page : $page;
			$section .= '/'.$page;
		} elseif ( ! is_null($page)) {
			return redirect('/'.$version);
		}

		$versions = Documentation::getDocVersions();
		
		return view('docs', [
			'title' => count($title) ? $title->text() : null,
			'index' => $this->docs->getIndex($version),
			'content' => $content,
			'currentVersion' => $versions[$version],
			'versions' => $versions,
			'currentSection' => $section,
		]);
	}

	/**
	 * Determine if the given URL segment is a valid version.
	 *
	 * @param  string  $version
	 * @return bool
	 */
	protected function isVersion($version)
	{
		return in_array($version, array_keys(Documentation::getDocVersions()));
	}
}
