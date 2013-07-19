<?php
/*
 * Extends AmazonECS class 
 */
class bcAmazonProductApi extends AmazonECS {
  
  
  /**
   * execute search
   *
   * @param string $pattern
   *
   * @return array|object return type depends on setting
   *
   * @see returnType()
   */
  public function search($pattern, $nodeId = null, $sort = 'relevancerank')
  {
    $category = parent::category();
    if (false === isset($category))
    {
      throw new Exception('No Category given: Please set it up before');
    }

    $browseNode = array();
    if (null !== $nodeId && true === $this->validateNodeId($nodeId))
    {
      $browseNode = array('BrowseNode' => $nodeId);
    }

    $params = $this->buildRequestParams('ItemSearch', array_merge(
      array(
        'Keywords' => $pattern,
        'SearchIndex' => $category,
        'Sort' => $sort
      ),
      $browseNode
    ));

    return $this->returnData(
      $this->performSoapRequest("ItemSearch", $params)
    );
  }
  
}?>