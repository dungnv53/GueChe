<?php
class CategorySeeder extends Seeder {
    function run() {
            Category::truncate();
            
            $category = new Category();
            $category->fill([
                'name'       => 'Món ăn',
    	    	'created_at' => date('Y-m-d H:i:s'),
    	    	'updated_at' => date('Y-m-d H:i:s'),
            ]);
            $category->save();

            $category = new Category();
            $category->fill([
                'name'       => 'Sữa chua',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
            $category->save();

            $category = new Category();
            $category->fill([
                'name'       => 'Chè',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
            $category->save();

            $category = new Category();
            $category->fill([
                'name'       => 'Nước ép',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
            $category->save();

            $category = new Category();
            $category->fill([
                'name'       => 'Sinh tố',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
            $category->save();

            $category = new Category();
            $category->fill([
                'name'       => 'Hoa quả ',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
            $category->save();
    }
}