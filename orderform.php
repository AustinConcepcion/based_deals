<!DOCTYPE html>
<html lang="en">
<!-- HELLO! I have written SQL queries that may work for these fields.
    I hope that helps speed this up when writing the controller!
    I used 'this.orderId' to indicate the orderId that is being passed to this page.
    You'll have to replace it with whatever is the correct way to pass stuff.  -->
  <head>
  <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <meta charset="utf-8">
    <title>Based Altar Order Form</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Mobile Specific Metas
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
  <body>

    <img src="images/basedaltar.png" width="30%">
    <h1> ORDER FORM </h1>

    <h2> Item Details: </h2>
    <div style="border: 1px solid; padding:1rem">
      <h3> Item Details </h3>
      <p> Order ID: this.orderId </p>

      <p> Product: SELECT p.productname
                   FROM product p, product_order o
                   WHERE o.pid = p.pid
                   AND o.orderId = this.orderId  </p>

      <p> Base Price: SELECT p.price
                      FROM product p, product_order o
                      WHERE o.pid = p.pid
                      AND o.orderId = this.orderId  </p>

      <p> Number of items: SELECT COUNT(*)
                           FROM discount_group d, product_order o
                           WHERE d.orderId = this.orderId </p>
      <p> Discount Percent: SELECT o.discount
                            FROM product_order o
                            where o.orderId = this.orderId</p>

      <p> Total Price: javascript math stuff needed here
                      (base_price * number_items) - (base_price * number_items * discount) </p>

    </div>

    <div style="border: 1px solid; padding:1rem">

      <h3> Primary Customer </h3>
      <p>Name: SELECT u.name
               FROM user_account u, product_order o
               WHERE o.oid = this.orderId
               AND u.uid = o.uid </p>

      <p>Address: SELECT u.address
                  FROM user_account u, product_order o
                  WHERE o.oid = this.orderId
                  AND u.uid = o.uid </p>

      <p>Payment Info: SELECT u.creditInfo
                       FROM user_account u, product_order o
                       WHERE o.oid = this.orderId
                       AND u.uid = o.uid </p>

    </div>
    <h3> Thank you for shopping at Lil B's one stop shop for your candle needs! </h3>
  </body>
</html>
