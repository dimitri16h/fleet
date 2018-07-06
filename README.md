#Project Idea

To create a website for freight shipping companies to better manage their day to day business, store analytics, and get a quick, topdown view of operations with a single glance. Fleet should help by automating large, repetitive portions of work, as well as creating paperwork automatically when necessary at certain points throughout the shipping pipeline, and storing relevant data in order to later prefill forms. 


#User Stories :
	
1. As an owner of a small business, I want all of my data in one place to get a better and quicker overview.

2. As a load broker, I want a way to track repeat customers and get my freight moving faster with less paper work and repetition.

3. As a tax preparer, it would make my job easier, if all relevant data was tracked as it happened rather than receiving trash bags of receipts quarterly.

I will add to this as I have better flowing notes.

Moqup: https://app.moqups.com/dimitri16h/5AZPpRCMP7/view


#Database Requirements

The flow of the website from login should start on the dashboard, where the user should be able to either add or select a company that they are a part of and wish to view. Once a company is selected, they should see a list of options based on their permissions within the company. Restricted options would be items such as managing the settings, adding or removing people to the company and so on. 

The main option from there, that the application should focus on initially is the dispatch or greenlight portion. This will involve working with customers and available trucks. You should see all currently open shipments/orders when you navigate to this page as well as an option to add a new shipment. Shipments are made with an order number, assigned truck or trucks, and a customer and have statuses that they go through along the way such as, initiated, in transit, delivered/awaiting invoice, etc.

In order to enable most of this, the database will need the following tables:

	Users
	Permissions
	Companies
	Trucks
	Customers
	Shipments

Users - Companies many to many


Companies - Trucks one to many
Companies - Customers one to many
Companies - Shipments one to many

Shipments - Customers one to many
Shipments - Trucks many to many