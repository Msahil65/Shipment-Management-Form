
CREATE DATABASE DELIVERY_DB;

USE DELIVERY_DB;

CREATE TABLE SHIPMENT_TABLE (
    Shipment_No INT PRIMARY KEY,
    Description VARCHAR(255),
    Source VARCHAR(100),
    Destination VARCHAR(100),
    Shipping_Date DATE,
    Expected_Delivery_Date DATE
);
