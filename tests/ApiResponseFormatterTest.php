<?php

namespace Tests\Unit;

use Okriiza\ApiResponseFormatter\ApiResponseFormatter;
use Illuminate\Http\JsonResponse;
use PHPUnit\Framework\TestCase;

class ApiResponseFormatterTest extends TestCase
{
  /**
   * Test success function
   *
   * @test
   */

  public function test_success(): void
  {
    $response = ApiResponseFormatter::success('Some Data', 'Some Message');

    $this->assertInstanceOf(JsonResponse::class, $response);
    $this->assertEquals(200, $response->getStatusCode());
    $this->assertEquals(true, $response->getData()->meta->status);
    $this->assertEquals('Some Message', $response->getData()->meta->message);
    $this->assertEquals('Some Data', $response->getData()->result);
  }

  /**
   * Test error function
   *
   * @test
   */
  public function test_error(): void
  {
    $response = ApiResponseFormatter::error('Some Error Message', 400);

    $this->assertInstanceOf(JsonResponse::class, $response);
    $this->assertEquals(400, $response->getStatusCode());
    $this->assertEquals(false, $response->getData()->meta->status);
    $this->assertEquals('Some Error Message', $response->getData()->meta->message);
    $this->assertNull($response->getData()->result);
  }
}
