public function search($params, $state_id = null, $product_id = null)
    {
        //select market.* from market
        $query = Market::find();

        /*if($state_id != null){
            $query->innerJoin('city', 'city.id = market.city_id')
            ->where(['city.state_id'=>$state_id]);  
        }*/


        //IN
        /*if($product_id != null){
            $subquery = ProductMarket::find()->select(['product_market.market_id'])
            ->where(['product_market.product_id'=>$product_id]);
            $query->where(['market.id'=>$subquery]);
        }*/
        
        //EXISTS
        /*if($product_id != null){
            $subquery = ProductMarket::find()->select(['product_market.market_id'])
            ->where(['product_market.product_id'=>$product_id])
            ->andWhere('product_market.market_id = market.id');

            $query->where(['exists',$subquery]);
        }*/

        //INNER JOIN
        /*if($product_id != null){            
            $query->distinct()
            ->innerJoin('product_market','product_market.market_id = market.id')
            ->where(['product_market.product_id'=>$product_id]);
        }*/        

        /*
            select market.*
            from market

            where market.id in (
            select product_market.market_id
            from product_market
            where product_market.product_id = 5);
        */