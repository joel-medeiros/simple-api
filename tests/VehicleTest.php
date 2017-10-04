<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class VehicleTest extends TestCase
{
    use DatabaseTransactions;

    public function testCreate()
    {
        $headers = $this->getAuth();

        $data['name'] = "320i";
        $data['brand'] = "BMW";
        $data['year'] = 2014;
        $data['description'] = "There’s one thing that separates the casual fan from the devoted follower: belief. And after more than 40 years of setting and raising the benchmark for innovation and performance, the BMW 3 Series Sedan has earned its following.";

        $see = ['name' => "320i"];
        $endPoint = $this->getDefaultRoute();
        $this->post($endPoint, $data, $headers);
        $this->seeStatusCode(200);
        $this->seeJson($see);
        $this->seeInDatabase('vehicles', $see);
    }

    public function testPatchUpdate()
    {
        $vehicle = factory(\App\Vehicle::class)->create();

        $headers = $this->getAuth();
        $data = ['name' => '330i'];
        $endPoint = $this->getDefaultRoute() . '/' . $vehicle->id;

        $this->patch($endPoint, $data , $headers);
        $this->seeStatusCode(200);
        $this->seeJson();
        $this->seeInDatabase('vehicles', $data);
    }

    public function testPutUpdate()
    {
        $vehicle = factory(\App\Vehicle::class)->create();

        $headers = $this->getAuth();
        $see = $data = ['name' => '330i'];
        $data['brand'] = 'BMW';
        $data['year'] = 2014;
        $data['description'] = "There’s one thing that separates the casual fan from the devoted follower: belief. And after more than 40 years of setting and raising the benchmark for innovation and performance, the BMW 3 Series Sedan has earned its following.";

        $endPoint = $this->getDefaultRoute() . '/' . $vehicle->id;

        $this->put($endPoint, $data , $headers);
        $this->seeStatusCode(200);
        $this->seeJson();
        $this->seeInDatabase('vehicles', $see);
    }

    public function testSearch()
    {
        $headers = $this->getAuth();
        $endPoint = $this->getDefaultRoute() . '/find?q=possimus';

        $this->get($endPoint, $headers);
        $this->seeStatusCode(200);
    }

    public function testDelete()
    {
        $vehicle = factory(\App\Vehicle::class)->create();

        $headers = $this->getAuth();
        $endPoint = $this->getDefaultRoute() . '/' . $vehicle->id;

        $this->delete($endPoint, [], $headers);
        $this->seeStatusCode(200);
        $this->seeJson();
    }

    public function testShow()
    {
        $vehicle = factory(\App\Vehicle::class)->create();
        $headers = $this->getAuth();
        $endPoint = $this->getDefaultRoute() . '/' . $vehicle->id;
        $this->get($endPoint, $headers);
        $this->seeStatusCode(200);
        $this->seeJson(['id' => $vehicle->id]);
    }

    public function testList()
    {
        $headers = $this->getAuth();
        $endPoint = $this->getDefaultRoute();
        $this->get($endPoint, $headers);
        $this->seeStatusCode(200);
    }

    private function getDefaultRoute()
    {
        return "/api/vehicles";
    }
}
