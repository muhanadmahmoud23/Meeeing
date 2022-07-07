-- This Task main goal is to show and send items , cart & orders of the client

-- this solution focus on backend 

-- Follow The single responsibility principle ;
    AddProductController@BuyProduct : responsable for calculating Items Properties 
    DatabaseTrait@OrdersTableCreateDB : send data to order table
    DatabaseTrait@CartsTableCreateDB : send data to cart table
    DatabaseTrait@OrdersTableUpdateDB : Get All Order Properties to DataBase
    DiscountTrait@ShoesDisount : get shoes discount value if order conatins shoe item type
    DiscountTrait@ItemsNumberDiscount : get shipping discount value order got 2 items or more
    DiscountTrait@JacketDiscount : get jacket discount value if order conatins (tshirt,blouse)
--All the traits Follow the OOP Encapsualtion, Inheritance, Abstarction Properties;

-Easy maintaince
-Responsable for one job 
-Easy to call it when needed in future and avoid DRY(dont repeat yourself)



-- if i got addtional time : 
  - i would work on the front end to make it more user friendly (create delete ajax button)
  - make the discount offers dynamic to be more easy to apply in future
  - Make A Submit Button in invoice page to update order table separtly

  ========================================================================================

To Run the task please follow the following CLI:

1.Download laravel folder

2.Run these commands :

composer update --no-scripts
php artisan migrate:fresh --seed
php artisan serve
