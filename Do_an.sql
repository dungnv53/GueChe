1. Catelog:
- eg. Món ăn, sữa chua, chè, đồ uống, hoa quả dầm ...
2. Food:
- Tên các món cụ thể theo danh mục:
	Món ăn: có nem, bánh ...
	Chè: các loại như đậu đỏ, mít, bưởi ...
3. User
4. Admin
5. Cart(Order): bảng quan hệ giữa user và food
User: id, name, email, pass
Admin: id, name, email, pass
Catelog: id, name,
Foot: id, cat_id( category id), name, price 
Cart(Order): id, food_id, user_id, status, quantity, price, datetime
	- status: giá trị 0 hoặc 1, 1 tức là trả tiền
	- price: giá tiền của 1 food
	- quantity: số lượng food được order

Yêu cầu : 
Admin:
	admin tạo mới các user
	admin có thể xem thông tin 1 food -> ai đặt food và đã trả tiền chưa
	admin có thể add mới order cho 1 user
User:
	user có thể order trực tiếp sau khi login
	user order xong thì sẽ save vào db và trả lại 1 view hiển thị thông tin vừa order(hoặc là ...)
	
