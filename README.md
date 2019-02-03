# REST-API-SY4-GILDED-ROSE

To launch the Api please:

run composer install
create the mysql db and configure in your local .env file
run php bin/console doctrine:schema:update --force
API endpoints implemented (test via postman or there are phpunit tests written using Guzzle client):

/item (POST) - creates new item; sample data: { "name": "test", "sell_in": 2, "quality": 25 }

item (GET) - gets the item by name; sample: /item?name=test

/items (GET)

jsonResponse:

[ { "id": 1, "name": "test", "sell_in": 2, "quality": 25 }, { "id": 6, "name": "test2", "sell_in": 5, "quality": 30 } ]