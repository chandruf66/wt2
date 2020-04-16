CREATE TABLE `cart` (
  `custid` int(11) DEFAULT NULL,
  `productcode` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `amt` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `cart` (`custid`, `productcode`, `qty`, `price`, `amt`) VALUES
(NULL, NULL, NULL, NULL, 0),
(NULL, NULL, NULL, NULL, 0),
(NULL, NULL, NULL, NULL, 0),
(NULL, 789, 7, 90000, 630000);

CREATE TABLE `customers` (
  `custid` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `area` varchar(30) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `pincode` varchar(20) DEFAULT NULL,
  `emailid` varchar(50) DEFAULT NULL,
  `password` varchar(10) DEFAULT NULL,
  `mobile` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `customers` (`custid`, `name`, `area`, `city`, `pincode`, `emailid`, `password`, `mobile`) VALUES
(1, 'Akshay', 'anand nagar', 'hubli', '09876', 'akshaymk1999@gmail.com', 'akshay', '8867212396'),
(2, 'sagar', 'hubli', 'hubli', '09876', 'sagar@gmail.com', '123', '0987654321'),
(3, 'vitthal', 'hubli', 'hubli', '5678', 'vittal@gmail.com', '987', '13456789'),
(4, 'Rajat', 'navanagar', 'hubli', '6754', 'rajat@gmail.com', '456', '0987654321'),
(5, 'yash', 'bangalore', 'bangalore', '098765', 'yash@gmail.com', '963', '987654321'),
(6, 'ashok', 'dwd', 'dwd', '123', 'ashok', '123', '987654123'),
(7, 'raj', 'hubli', 'hubli', '789', 'raj@gmail.com', 'raj', '987654321');


CREATE TABLE `orderdetails` (
  `orderno` int(11) DEFAULT NULL,
  `productcode` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `orderdetails` (`orderno`, `productcode`, `qty`, `price`, `amount`) VALUES
(4, 788, 4, 888, 3552),
(4, 789, 5, 90000, 450000),
(4, 4356, 5, 45, 225),
(5, 788, 8, 888, 7104),
(5, 4356, 3, 45, 135),
(6, 787, 8, 789, 6312),
(6, 4356, 9, 45, 405),
(7, 787, 1, 789, 789),
(8, 787, 5, 789, 3945),
(8, 788, 5, 888, 4440);


CREATE TABLE `orders` (
  `orderno` int(11) NOT NULL,
  `orderdate` date DEFAULT NULL,
  `custid` int(11) DEFAULT NULL,
  `totalamount` int(11) DEFAULT NULL,
  `tax` float DEFAULT NULL,
  `netamount` float DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `orders` (`orderno`, `orderdate`, `custid`, `totalamount`, `tax`, `netamount`, `status`) VALUES
(1, '2018-01-21', NULL, NULL, 0, 0, 'New Order'),
(2, '2018-01-23', NULL, NULL, 0, 0, 'New Order'),
(3, '2018-01-23', NULL, NULL, 0, 0, 'New Order'),
(4, '2018-01-23', 4, 453777, 18151.1, 471928, 'New Order'),
(5, '2018-01-25', 5, 7239, 289.56, 7528.56, 'New Order'),
(6, '2018-02-08', 6, 6717, 268.68, 6985.68, 'New Order'),
(7, '2018-03-22', 2, 789, 31.56, 820.56, 'New Order'),
(8, '2018-03-24', 1, 8385, 335.4, 8720.4, 'New Order');

CREATE TABLE `products` (
  `productcode` int(11) NOT NULL,
  `productname` varchar(20) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `img` varchar(50) DEFAULT NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `products` (`productcode`, `productname`, `price`, `stock`,`img`) VALUES
(222, ' camera', 5000, 45,'product-images\camera.jpg'),
(444, ' hard-drive', 1000, 97,'product-images\external-hard-drive.jpg'),
(666, 'laptop', 90000, 57,'product-images\laptop.jpg'),
(888, 'watch', 4500, 32,'product-images\watch.jpg');


CREATE TABLE `users` (
  `loginid` varchar(10) NOT NULL,
  `password` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `users` (`loginid`, `password`) VALUES
('abc', 'aaa');

ALTER TABLE `customers`
  ADD PRIMARY KEY (`custid`),
  ADD UNIQUE KEY `emailid` (`emailid`);

ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderno`);

ALTER TABLE `products`
  ADD PRIMARY KEY (`productcode`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`loginid`);

-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `custid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

