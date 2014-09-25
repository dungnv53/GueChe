1. Catelog:
  - eg. Món ăn, sữa chua, chè, đồ uống, hoa quả dầm ...
2. Food:
  - Tên các món cụ thể theo danh mục:
  Món ăn: có nem, bánh ...
  Chè: các loại như đậu đỏ, mít, bưởi ...



3. User
4. Admin
5. Cart


1. Admin:
+ id
+ username
+ password

2. User:
+ id
+ username
+ password

3. Catelog:
+ id
+ name

4. Food
+ id
+ cat_id
+ name
+ price
+ unit

5. Purchasing:
+ id
+ user_id
+ product_id (food_id)
+ time
+ number


