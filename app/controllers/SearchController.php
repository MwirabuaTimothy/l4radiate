<?php

class SearchController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function search()
	{
		$data = '<p>Oops, your search returned no book. Please try another search.</p>'; 

		if($_GET['booksearch'] == "Search for a book title, Subject, Author or ISBN..."){
			$data = '<p>Please type in a query to search...</p>';
		}
		if(isset($_GET['booksearch']) && $_GET['booksearch'] != "Search for a book title, Subject, Author or ISBN...") { 
			$filters['q'] = Input::get('booksearch');
			$filters['node'] = Input::get('category', 283155);
			$filters['page'] = Input::get('page', 1); 
			$filters['sort'] = Input::get('sort');
			//echo $filters['q'];

		    // These are nodes from Amazon.com, I found them on browsenodes.com
			$this->textBookNodes = array(
				'All Books' => 283155,
				'All Textbooks' => 465600,
				'Business & Finance Textbooks' => 468220,
				'Communication & Journalism Textbooks' => 468226,
				'Computer Science Textbooks' => 468204,
				'Education Textbooks' =>  468224,
				'Engineering Textbooks' => 468212,
				'Humanities Textbooks'  => 468206,
				'Law Textbooks' => 468222,
				'Medicine & Health Sciences Textbooks' => 468228,
				'Reference Textbooks' => 684283011,
				'Science & Mathematics Textbooks' => 468216,
				'Social Sciences Textbooks' => 468214
				);

			if(array_search($filters['node'], $this->textBookNodes) === FALSE){
				$filter['node'] = 283155;
			}

			$this->sorts = array(
				'Relevance' => 'relevancerank',
				'Alphabetical: A to Z' => 'titlerank',
				'Alphabetical: Z to A' => '-titlerank',
				'Bestselling' => 'salesrank',
				'Average customer review' => 'reviewrank',
				'Price: low to high' => 'pricerank',
				'Price: high to low' => 'inverse-pricerank',
				'Publication date: newer to older' => 'daterank'
				);

			if(array_search($filters['sort'], $this->sorts) === FALSE){
				$filter['sort'] = 'relevancerank';
			}

			$amazonProductApi = new bcAmazonProductApi();

		    // changing the category to DVD and the response to only images and looking for some matrix stuff.
			$response = $amazonProductApi->category('Books')->responseGroup('Medium');


		    // from now on you want to have pure arrays as response
			$amazonProductApi->returnType(AmazonECS::RETURN_TYPE_ARRAY);
			$amazonProductApi->page($filters['page']);



		    // searching again
			if(is_null($filters['q']) OR strlen($filters['q'])<1){
				$this->results = NULL;
			}else{
				$this->results = $amazonProductApi->search($filters['q'], $filters['node'], $filters['sort']);
			}

			$this->filters = $filters;
			$results = $this->results;

			
			if(isset($results['Items']['Item'])){
				$data = array();
				foreach ($results['Items']['Item'] as $item) {
					
					array_push($data, $item);
				}
			}

			//$dataa = json_decode(json_encode($data), FALSE);
			//var_dump($data);
		}
		return View::make('searchresults', compact('data'));
		//return View::make('searchsingle', compact('data'));
	
	}

	public function ssearch(){
		$data = '<p>Oops, your book was not found. Please try another search.</p>'; 

		if($_GET['booksearch'] == "Search for a book title, Subject, Author or ISBN..."){
			$data = '<p>Please type in a query to search...</p>';
		}
		if(isset($_GET['booksearch']) && $_GET['booksearch'] != "Search for a book title, Subject, Author or ISBN...") { 
			/* Example usage of the Amazon Product Advertising API */ 

			$obj = new AmazonProductAPI(); 
			$result ='' ; 

				$result = $obj->searchProducts($_GET['booksearch'], 
					AmazonProductAPI::Books, 
					"TITLE"); 
				$data = $result->Items;

				if(isset($result->Items)){
					$xmlstring = $result->Items;
					if ($xmlstring) {
						foreach ($xmlstring->Item as $item) {
							array_push($data, $item);
						}
					}
				}
	
		}
		return View::make('searchresults', compact('data'));
		//return View::make('searchsingle', compact('data'));

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}