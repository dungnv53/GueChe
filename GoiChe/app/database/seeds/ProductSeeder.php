<?php
class ProductSeeder extends Seeder {
    function run() {
            Product::truncate();
            
            $product = new Product();
            $product->fill([
                'name'       => 'Bánh bột lọc',
                'price'      => '3.500',
                'unit'       =>  'cai',
                'cat_id'     =>  '1',
    	    	'created_at' => date('Y-m-d H:i:s'),
    	    	'updated_at' => date('Y-m-d H:i:s'),
            ]);
            $product->save();

            $product = new Product();
            $product->fill([
                'name'       => 'Bánh rán ngọt',
                'price'      => '5000',
                'unit'       =>  'cai',
                'cat_id'     =>  '1',
    	    	'created_at' => date('Y-m-d H:i:s'),
    	    	'updated_at' => date('Y-m-d H:i:s'),
            ]);
            $product->save();

              $product = new Product();
            $product->fill([
                'name'       => 'Bánh tẻ',
                'price'      => '6000',
                'unit'       =>  'cai',
                'cat_id'     =>  '1',
    	    	'created_at' => date('Y-m-d H:i:s'),
    	    	'updated_at' => date('Y-m-d H:i:s'),
            ]);
            $product->save();

  			$product = new Product();
            $product->fill([
                'name'       => 'Bánh rán mặn',
                'price'      => '5000',
                'unit'       =>  'cai',
                'cat_id'     =>  '1',
    	    	'created_at' => date('Y-m-d H:i:s'),
    	    	'updated_at' => date('Y-m-d H:i:s'),
            ]);
            $product->save();

  			$product = new Product();
            $product->fill([
                'name'       => 'Phỏ cuốn',
                'price'      => '6000',
                'unit'       =>  'cai',
                'cat_id'     =>  '1',
    	    	'created_at' => date('Y-m-d H:i:s'),
    	    	'updated_at' => date('Y-m-d H:i:s'),
            ]);
            $product->save();

  			$product = new Product();
            $product->fill([
                'name'       => 'Nem chua rán',
                'price'      => '5000',
                'unit'       =>  'cai',
                'cat_id'     =>  '1',
    	    	'created_at' => date('Y-m-d H:i:s'),
    	    	'updated_at' => date('Y-m-d H:i:s'),
            ]);
            $product->save();

  			$product = new Product();
            $product->fill([
                'name'       => 'Nem chua nướng',
                'price'      => '5000',
                'unit'       =>  'cai',
                'cat_id'     =>  '1',
    	    	'created_at' => date('Y-m-d H:i:s'),
    	    	'updated_at' => date('Y-m-d H:i:s'),
            ]);
            $product->save();

  			$product = new Product();
            $product->fill([
                'name'       => 'Nem cuốn tôm thịt',
                'price'      => '7000',
                'unit'       =>  'cai',
                'cat_id'     =>  '1',
    	    	'created_at' => date('Y-m-d H:i:s'),
    	    	'updated_at' => date('Y-m-d H:i:s'),
            ]);
            $product->save();

  			$product = new Product();
            $product->fill([
                'name'       => 'Nem lụi',
                'price'      => '7000',
                'unit'       =>  'cai',
                'cat_id'     =>  '1',
    	    	'created_at' => date('Y-m-d H:i:s'),
    	    	'updated_at' => date('Y-m-d H:i:s'),
            ]);
            $product->save();

  			$product = new Product();
            $product->fill([
                'name'       => 'Thịt xiên nướng',
                'price'      => '7000',
                'unit'       =>  'xiên',
                'cat_id'     =>  '1',
    	    	'created_at' => date('Y-m-d H:i:s'),
    	    	'updated_at' => date('Y-m-d H:i:s'),
            ]);
            $product->save();

  			$product = new Product();
            $product->fill([
                'name'       => 'Xúc xích Đức Việt',
                'price'      => '12000',
                'unit'       =>  'cai',
                'cat_id'     =>  '1',
    	    	'created_at' => date('Y-m-d H:i:s'),
    	    	'updated_at' => date('Y-m-d H:i:s'),
            ]);
            $product->save();

  			$product = new Product();
            $product->fill([
                'name'       => 'Nem cuốn',
                'price'      => '6000',
                'unit'       =>  'cai',
                'cat_id'     =>  '1',
    	    	'created_at' => date('Y-m-d H:i:s'),
    	    	'updated_at' => date('Y-m-d H:i:s'),
            ]);
            $product->save();

  			$product = new Product();
            $product->fill([
                'name'       => 'Bánh gối',
                'price'      => '10000',
                'unit'       =>  'cai',
                'cat_id'     =>  '1',
    	    	'created_at' => date('Y-m-d H:i:s'),
    	    	'updated_at' => date('Y-m-d H:i:s'),
            ]);
            $product->save();

  			$product = new Product();
            $product->fill([
                'name'       => 'Khoai môn lệ phố',
                'price'      => '20000',
                'unit'       =>  'suất',
                'cat_id'     =>  '1',
    	    	'created_at' => date('Y-m-d H:i:s'),
    	    	'updated_at' => date('Y-m-d H:i:s'),
            ]);
            $product->save();

  			$product = new Product();
            $product->fill([
                'name'       => 'Khoai(Lang/Tây) chiên',
                'price'      => '30000',
                'unit'       =>  'suất',
                'cat_id'     =>  '1',
    	    	'created_at' => date('Y-m-d H:i:s'),
    	    	'updated_at' => date('Y-m-d H:i:s'),
            ]);
            $product->save();

  			$product = new Product();
            $product->fill([
                'name'       => 'Củ đậu/ Dưa chuột',
                'price'      => '15000',
                'unit'       =>  'suất',
                'cat_id'     =>  '1',
    	    	'created_at' => date('Y-m-d H:i:s'),
    	    	'updated_at' => date('Y-m-d H:i:s'),
            ]);
            $product->save();

 		 	$product = new Product();
            $product->fill([
                'name'       => 'Nem tai',
                'price'      => '27000',
                'unit'       =>  'suất',
                'cat_id'     =>  '1',
    	    	'created_at' => date('Y-m-d H:i:s'),
    	    	'updated_at' => date('Y-m-d H:i:s'),
            ]);
            $product->save();

  			$product = new Product();
            $product->fill([
                'name'       => 'Nem phùng',
                'price'      => '22000',
                'unit'       =>  'suât',
                'cat_id'     =>  '1',
    	    	'created_at' => date('Y-m-d H:i:s'),
    	    	'updated_at' => date('Y-m-d H:i:s'),
            ]);
            $product->save();

  			$product = new Product();
            $product->fill([
                'name'       => 'Nộm bò khô',
                'price'      => '22000',
                'unit'       =>  'bát',
                'cat_id'     =>  '1',
    	    	'created_at' => date('Y-m-d H:i:s'),
    	    	'updated_at' => date('Y-m-d H:i:s'),
            ]);
            $product->save();

  			$product = new Product();
            $product->fill([
                'name'       => 'Pate',
                'price'      => '170000',
                'unit'       =>  'kg',
                'cat_id'     =>  '1',
    	    	'created_at' => date('Y-m-d H:i:s'),
    	    	'updated_at' => date('Y-m-d H:i:s'),
            ]);
            $product->save();

  			$product = new Product();
            $product->fill([
                'name'       => 'Mít nghệ bóc múi',
                'price'      => '90000',
                'unit'       =>  'kg',
                'cat_id'     =>  '1',
    	    	'created_at' => date('Y-m-d H:i:s'),
    	    	'updated_at' => date('Y-m-d H:i:s'),
            ]);
            $product->save();

  			$product = new Product();
            $product->fill([
                'name'       => 'Caramen',
                'price'      => '8000',
                'unit'       =>  'cốc',
                'cat_id'     =>  '2',
    	    	'created_at' => date('Y-m-d H:i:s'),
    	    	'updated_at' => date('Y-m-d H:i:s'),
            ]);
            $product->save();

 			$product = new Product();
            $product->fill([
                'name'       => 'Caramen thập cẩm',
                'price'      => '15000',
                'unit'       =>  'cốc',
                'cat_id'     =>  '2',
    	    	'created_at' => date('Y-m-d H:i:s'),
    	    	'updated_at' => date('Y-m-d H:i:s'),
            ]);
            $product->save();

  			$product = new Product();
            $product->fill([
                'name'       => 'Sữa chua đậu đỏ',
                'price'      => '15000',
                'unit'       =>  'cốc',
                'cat_id'     =>  '2',
    	    	'created_at' => date('Y-m-d H:i:s'),
    	    	'updated_at' => date('Y-m-d H:i:s'),
            ]);
            $product->save();

  			$product = new Product();
            $product->fill([
                'name'       => 'Sữa chua nếp cẩm',
                'price'      => '15000',
                'unit'       =>  'cốc',
                'cat_id'     =>  '2',
    	    	'created_at' => date('Y-m-d H:i:s'),
    	    	'updated_at' => date('Y-m-d H:i:s'),
            ]);
            $product->save();

			$product = new Product();
            $product->fill([
                'name'       => 'Sữa chua nha đam',
                'price'      => '15000',
                'unit'       =>  'cốc',
                'cat_id'     =>  '2',
    	    	'created_at' => date('Y-m-d H:i:s'),
    	    	'updated_at' => date('Y-m-d H:i:s'),
            ]);
            $product->save();

  			$product = new Product();
            $product->fill([
                'name'       => 'Sữa chua thạch',
                'price'      => '15000',
                'unit'       =>  'cốc',
                'cat_id'     =>  '2',
    	    	'created_at' => date('Y-m-d H:i:s'),
    	    	'updated_at' => date('Y-m-d H:i:s'),
            ]);
            $product->save();

            $product = new Product();
            $product->fill([
                'name'       => 'Sữa chua táo nha đam',
                'price'      => '18000',
                'unit'       =>  'cốc',
                'cat_id'     =>  '2',
    	    	'created_at' => date('Y-m-d H:i:s'),
    	    	'updated_at' => date('Y-m-d H:i:s'),
            ]);
            $product->save();

  			$product = new Product();
            $product->fill([
                'name'       => 'Sữa chua nếp cẩm mít',
                'price'      => '16000',
                'unit'       =>  'cốc',
                'cat_id'     =>  '2',
    	    	'created_at' => date('Y-m-d H:i:s'),
    	    	'updated_at' => date('Y-m-d H:i:s'),
            ]);
            $product->save();

 			$product = new Product();
			$product->fill([
                'name'       => 'Sữa chua mít',
                'price'      => '16000',
                'unit'       =>  'cốc',
                'cat_id'     =>  '2',
    	    	'created_at' => date('Y-m-d H:i:s'),
    	    	'updated_at' => date('Y-m-d H:i:s'),
            ]);
            $product->save();

            $product = new Product();
            $product->fill([
                'name'       => 'Sữa chua hoa quả',
                'price'      => '18000',
                'unit'       =>  'cốc',
                'cat_id'     =>  '2',
    	    	'created_at' => date('Y-m-d H:i:s'),
    	    	'updated_at' => date('Y-m-d H:i:s'),
            ]);
            $product->save();

            $product = new Product();
            $product->fill([
                'name'       => 'Sữa chua xoài',
                'price'      => '18000',
                'unit'       =>  'cốc',
                'cat_id'     =>  '2',
    	    	'created_at' => date('Y-m-d H:i:s'),
    	    	'updated_at' => date('Y-m-d H:i:s'),
            ]);
            $product->save();

			$product = new Product();
            $product->fill([
                'name'       => 'Sữa chua bơ',
                'price'      => '18000',
                'unit'       =>  'cốc',
                'cat_id'     =>  '2',
    	    	'created_at' => date('Y-m-d H:i:s'),
    	    	'updated_at' => date('Y-m-d H:i:s'),
            ]);
            $product->save();

			$product = new Product();
            $product->fill([
                'name'       => 'Sữa chua dâu tây',
                'price'      => '20000',
                'unit'       =>  'cốc',
                'cat_id'     =>  '2',
    	    	'created_at' => date('Y-m-d H:i:s'),
    	    	'updated_at' => date('Y-m-d H:i:s'),
            ]);
            $product->save();


  			$product = new Product();
            $product->fill([
                'name'       => 'Chè đậu xanh',
                'price'      => '15000',
                'unit'       =>  'cốc',
                'cat_id'     =>  '3',
    	    	'created_at' => date('Y-m-d H:i:s'),
    	    	'updated_at' => date('Y-m-d H:i:s'),
            ]);
            $product->save();

            $product = new Product();
            $product->fill([
                'name'       => 'Chè đậu đen cốt dừa',
                'price'      => '15000',
                'unit'       =>  'cốc',
                'cat_id'     =>  '3',
    	    	'created_at' => date('Y-m-d H:i:s'),
    	    	'updated_at' => date('Y-m-d H:i:s'),
            ]);
            $product->save();

            $product = new Product();
            $product->fill([
                'name'       => 'Chè ngô cốm',
                'price'      => '15000',
                'unit'       =>  'cốc',
                'cat_id'     =>  '3',
    	    	'created_at' => date('Y-m-d H:i:s'),
    	    	'updated_at' => date('Y-m-d H:i:s'),
            ]);
            $product->save();

            $product = new Product();
            $product->fill([
                'name'       => 'Chè bưởi',
                'price'      => '15000',
                'unit'       =>  'cốc',
                'cat_id'     =>  '3',
    	    	'created_at' => date('Y-m-d H:i:s'),
    	    	'updated_at' => date('Y-m-d H:i:s'),
            ]);
            $product->save();


             $product->fill([
                'name'       => 'Chè đậu đỏ cốt dừa',
                'price'      => '15000',
                'unit'       =>  'cốc',
                'cat_id'     =>  '3',
    	    	'created_at' => date('Y-m-d H:i:s'),
    	    	'updated_at' => date('Y-m-d H:i:s'),
            ]);
            $product->save();

            $product = new Product();
            $product->fill([
                'name'       => 'Chè mít',
                'price'      => '15000',
                'unit'       =>  'cốc',
                'cat_id'     =>  '3',
    	    	'created_at' => date('Y-m-d H:i:s'),
    	    	'updated_at' => date('Y-m-d H:i:s'),
            ]);
            $product->save();

            $product = new Product();
            $product->fill([
                'name'       => 'Chè hạt sen đậu xanh',
                'price'      => '15000',
                'unit'       =>  'cốc',
                'cat_id'     =>  '3',
    	    	'created_at' => date('Y-m-d H:i:s'),
    	    	'updated_at' => date('Y-m-d H:i:s'),
            ]);
            $product->save();

            $product = new Product();
            $product->fill([
                'name'       => 'Chè hạt sen nha đam',
                'price'      => '15000',
                'unit'       =>  'cốc',
                'cat_id'     =>  '3',
    	    	'created_at' => date('Y-m-d H:i:s'),
    	    	'updated_at' => date('Y-m-d H:i:s'),
            ]);
            $product->save();


             $product->fill([
                'name'       => 'Chè khoai môn cốm',
                'price'      => '15000',
                'unit'       =>  'cốc',
                'cat_id'     =>  '3',
    	    	'created_at' => date('Y-m-d H:i:s'),
    	    	'updated_at' => date('Y-m-d H:i:s'),
            ]);
            $product->save();

            $product = new Product();
            $product->fill([
                'name'       => 'Chè đậu ngự',
                'price'      => '15000',
                'unit'       =>  'cốc',
                'cat_id'     =>  '3',
    	    	'created_at' => date('Y-m-d H:i:s'),
    	    	'updated_at' => date('Y-m-d H:i:s'),
            ]);
            $product->save();

            $product = new Product();
            $product->fill([
                'name'       => 'Chè sương sa hạt lựu',
                'price'      => '15000',
                'unit'       =>  'cốc',
                'cat_id'     =>  '3',
    	    	'created_at' => date('Y-m-d H:i:s'),
    	    	'updated_at' => date('Y-m-d H:i:s'),
            ]);
            $product->save();

            $product = new Product();
            $product->fill([
                'name'       => 'Chè khúc bạch',
                'price'      => '20000',
                'unit'       =>  'cốc',
                'cat_id'     =>  '3',
    	    	'created_at' => date('Y-m-d H:i:s'),
    	    	'updated_at' => date('Y-m-d H:i:s'),
            ]);
            $product->save();

            $product = new Product();
            $product->fill([
                'name'       => 'Chè thập cẩm',
                'price'      => '15000',
                'unit'       =>  'cốc',
                'cat_id'     =>  '3',
    	    	'created_at' => date('Y-m-d H:i:s'),
    	    	'updated_at' => date('Y-m-d H:i:s'),
            ]);
            $product->save();

  			$product = new Product();
            $product->fill([
                'name'       => 'Nước ép cà chua',
                'price'      => '18000',
                'unit'       =>  'cốc',
                'cat_id'     =>  '4',
    	    	'created_at' => date('Y-m-d H:i:s'),
    	    	'updated_at' => date('Y-m-d H:i:s'),
            ]);
            $product->save();

  			$product = new Product();
            $product->fill([
                'name'       => 'Nước ép chanh leo',
                'price'      => '18000',
                'unit'       =>  'cốc',
                'cat_id'     =>  '4',
    	    	'created_at' => date('Y-m-d H:i:s'),
    	    	'updated_at' => date('Y-m-d H:i:s'),
            ]);
            $product->save();

  
  			$product = new Product();
            $product->fill([
                'name'       => 'Nước ép cà rốt mật ong',
                'price'      => '18000',
                'unit'       =>  'cốc',
                'cat_id'     =>  '4',
    	    	'created_at' => date('Y-m-d H:i:s'),
    	    	'updated_at' => date('Y-m-d H:i:s'),
            ]);
            $product->save();

  
  			$product = new Product();
            $product->fill([
                'name'       => 'Nước ép dưa hấu',
                'price'      => '18000',
                'unit'       =>  'cốc',
                'cat_id'     =>  '4',
    	    	'created_at' => date('Y-m-d H:i:s'),
    	    	'updated_at' => date('Y-m-d H:i:s'),
            ]);
            $product->save();

  
  			$product = new Product();
            $product->fill([
                'name'       => 'Nước ép cam',
                'price'      => '20000',
                'unit'       =>  'cốc',
                'cat_id'     =>  '4',
    	    	'created_at' => date('Y-m-d H:i:s'),
    	    	'updated_at' => date('Y-m-d H:i:s'),
            ]);
            $product->save();

   			$product = new Product();
            $product->fill([
                'name'       => 'Sinh tố dứa',
                'price'      => '18000',
                'unit'       =>  'cốc',
                'cat_id'     =>  '5',
    	    	'created_at' => date('Y-m-d H:i:s'),
    	    	'updated_at' => date('Y-m-d H:i:s'),
            ]);
            $product->save();

			$product = new Product();
            $product->fill([
                'name'       => 'Sinh tố bơ',
                'price'      => '20000',
                'unit'       =>  'cốc',
                'cat_id'     =>  '5',
    	    	'created_at' => date('Y-m-d H:i:s'),
    	    	'updated_at' => date('Y-m-d H:i:s'),
            ]);
            $product->save();

			$product = new Product();
            $product->fill([
                'name'       => 'Sinh tố chanh leo',
                'price'      => '18000',
                'unit'       =>  'cốc',
                'cat_id'     =>  '5',
    	    	'created_at' => date('Y-m-d H:i:s'),
    	    	'updated_at' => date('Y-m-d H:i:s'),
            ]);
            $product->save();

			$product = new Product();
            $product->fill([
                'name'       => 'Sinh tố xoài',
                'price'      => '20000',
                'unit'       =>  'cốc',
                'cat_id'     =>  '5',
    	    	'created_at' => date('Y-m-d H:i:s'),
    	    	'updated_at' => date('Y-m-d H:i:s'),
            ]);
            $product->save();


			$product = new Product();
            $product->fill([
                'name'       => 'Dưa hấu dầm',
                'price'      => '18000',
                'unit'       =>  'cốc',
                'cat_id'     =>  '6',
    	    	'created_at' => date('Y-m-d H:i:s'),
    	    	'updated_at' => date('Y-m-d H:i:s'),
            ]);
            $product->save();

            $product = new Product();
            $product->fill([
                'name'       => 'Bơ dầm',
                'price'      => '18000',
                'unit'       =>  'cốc',
                'cat_id'     =>  '6',
    	    	'created_at' => date('Y-m-d H:i:s'),
    	    	'updated_at' => date('Y-m-d H:i:s'),
            ]);
            $product->save();

			$product = new Product();
            $product->fill([
                'name'       => 'Hoa quả dầm',
                'price'      => '18000',
                'unit'       =>  'cốc',
                'cat_id'     =>  '6',
    	    	'created_at' => date('Y-m-d H:i:s'),
    	    	'updated_at' => date('Y-m-d H:i:s'),
            ]);
            $product->save();


        }
    }