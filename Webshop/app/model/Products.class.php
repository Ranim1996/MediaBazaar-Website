<?php 
class Products 
{
    public function GetTopProducts()
    {
        $dbconn=new db_connect();
        $topProd = $dbconn->connect()->prepare("SELECT * FROM product GROUP BY `product_price` DESC LIMIT 5;");
        $topProd->execute();
        $topProducts = $topProd->fetchAll();
        return $topProducts;
    }   

    public function GetNrProductsByCategory()
    {
        global $category;
        if(isset($_GET["data"]))
        {
            $category=$_GET["data"];
            $_SESSION['categoryVal']=$category;
        } 

        $dbconn=new db_connect();
        $nrPr = $dbconn->connect()->prepare("SELECT COUNT(id) FROM product WHERE Category = '$category';");
        $nrPr->execute();
        $nrProducts = $nrPr->fetchAll();
        return $nrProducts;                  
    
        $nrOfProducts=0;
    
        foreach ($nrProducts as $value)         
        {           
            $nrOfProducts=$value;
        }       
    }

    public function GetBrandsByCategory()
    {
        global $category;
        $dbconn=new db_connect();
        $brands = $dbconn->connect()->prepare("SELECT DISTINCT Brand FROM product WHERE Category = '$category';");
        $brands->execute();
        $distinctBrands = $brands->fetchAll();
        return $distinctBrands;   
    } 

    public function GetNrSearchedProducts()
    {
        global $category;
        if(isset($_POST["submit-product"]))
        {            
            $category=$_POST['search'];

            $_SESSION['search-prod']=$category;
        } 
        $dbconn=new db_connect();
        $nrPr = $dbconn->connect()->query("SELECT COUNT(id) FROM product WHERE Category = '$category';");
        $nrProducts = $nrPr->fetch();           
     
        $nrOfProducts=0;
       
        foreach ($nrProducts as $value)         
        {           
            $nrOfProducts=$value;
        }
    }

    public function GetBrandsForSearched()
    {
        global $category;
        $dbconn=new db_connect();
        $brands = $dbconn->connect()->prepare("SELECT DISTINCT Brand FROM product WHERE Category = '$category';");
        $brands->execute();
        $distinctBrands = $brands->fetchAll();
        return $distinctBrands;   
    } 


}
?>
