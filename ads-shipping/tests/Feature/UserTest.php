<?php

namespace Tests\Feature;

use App\Http\Controllers\HomeController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;

class ShippingTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testShippingCalculation()
    {
        $province_origin = Province::findOrFail(11);
        $regency_origin = Regency::findOrFail(1101);
        $district_origin = District::findOrFail(110101);
        $village_origin = Village::findOrFail(1101012001);

        $province_destination = Province::findOrFail(11);
        $regency_destination = Regency::findOrFail(1101);
        $district_destination = District::findOrFail(110101);
        $village_destination = Village::findOrFail(1101012017);

        $data = [
            'province_origin' => $province_origin->id,
            'regency_origin' => $regency_origin->id,
            'district_origin' => $district_origin->id,
            'village_origin' => $village_origin->id,
            'province_destination' => $province_destination->id,
            'regency_destination' => $regency_destination->id,
            'district_destination' => $district_destination->id,
            'village_destination' => $village_destination->id,
            'weight' => 1000 // 1 kg
        ];

        $response = $this->post('/shippings', $data);

        dump($response);

        $response->assertStatus(200)
            ->assertViewIs('shipping')
            ->assertViewHas('data')
            ->assertViewHas('distance')
            ->assertViewHas('fee')
            ->assertViewHas('deliveryTime')
            ->assertViewHas('shipping');
    }

    public function testGetProvince()
    {
        $test = new HomeController();
        $response = $test->index();

        dump($response);
        
        $this->assertArrayHasKey('provinces', $response->getData());
    }
}