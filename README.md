# xyzservices

### Set up database connectivity and seed the database

Update database paramaters in .env file in project root and run migrations

    php artisan migrate
    cat seedroles | php artisan tinker

### Run the development server

The following command will run the development server

    php artisan serve


The Laravel welcome page is intentionally not removed !!

### Usage

This app is not an app to use at all. This is a bare minimal solution for an internship selection problem. This shows how we can easily create a process lifecycle in laravel. The concept is not limited to laravel/php rather generic. This relational data model keeps track of the current status of a service request raised.

To test it out you can register few sample service professional accounts, few sample customer accounts and just try raising some service requests, accepting them and marking them done to see them in correct place among New, Ongoing and Hired. Since this is made only to show the flow I have omitted many validations that should have been there in any real case. I didn't care taking many profile informations like address of the customer or kind of service the professional gives which would be absolutely necessary in a real case. Those cases can easily be handled by adding a profile model to the users. Here we are not asking for any confirmation from user as well when the service professional says he has completed his job which in real case should be done.

However it successfully implements role based authorizations. It also clearly depicts the mentioned flow in a neat bootstrap UI. 
