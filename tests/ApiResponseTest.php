<?php

namespace Tests\Unit\Okriiza\ApiResponseFormatter;

use Okriiza\ApiResponseFormatter\ApiResponse;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

/**
 * Class ApiResponseFormatterTest.
 *
 * @covers \Okriiza\ApiResponseFormatter\ApiResponseFormatter
 */
final class ApiResponseTest extends TestCase
{
  private ApiResponse $apiResponse;

  /**
   * {@inheritdoc}
   */
  protected function setUp(): void
  {
    parent::setUp();

    /** @todo Correctly instantiate tested object to use it. */
    $this->apiResponse = new ApiResponse();
  }

  /**
   * {@inheritdoc}
   */
  protected function tearDown(): void
  {
    parent::tearDown();

    unset($this->apiResponse);
  }

  public function testSuccessResponse()
  {
    $response = ApiResponse::success("success data", 'Success', 'true', intval(Response::HTTP_OK));

    $this->assertEquals(intval(Response::HTTP_OK), $response->getStatusCode());
    $this->assertEquals('Success', $response->getData()->meta->message);
    $this->assertEquals('true', $response->getData()->meta->success);
    $this->assertEquals('200', $response->getData()->meta->code);
    $this->assertEquals('success data', $response->getData()->result);
  }

  public function testCreatedResponse()
  {
    $response = ApiResponse::created('created data', 'Created', 'true', intval(Response::HTTP_CREATED));

    $this->assertEquals(intval(Response::HTTP_CREATED), $response->getStatusCode());
    $this->assertEquals('Created', $response->getData()->meta->message);
    $this->assertEquals('true', $response->getData()->meta->success);
    $this->assertEquals(intval(Response::HTTP_CREATED), $response->getData()->meta->code);
    $this->assertEquals('created data', $response->getData()->result);
  }

  public function testNoContentResponse()
  {
    $response = ApiResponse::noContent(
      null,
      'No Content',
      'true',
      intval(Response::HTTP_NO_CONTENT)
    );

    $this->assertEquals(intval(Response::HTTP_NO_CONTENT), $response->getStatusCode());
    $this->assertEquals('No Content', $response->getData()->meta->message);
    $this->assertEquals('true', $response->getData()->meta->success);
    $this->assertEquals(intval(Response::HTTP_NO_CONTENT), $response->getData()->meta->code);
    $this->assertNull($response->getData()->result);
  }

  public function testErrorResponse()
  {
    $response = ApiResponse::error(
      null,
      'Bad Request',
      'false',
      intval(Response::HTTP_BAD_REQUEST)
    );

    $this->assertEquals(intval(Response::HTTP_BAD_REQUEST), $response->getStatusCode());
    $this->assertEquals('Bad Request', $response->getData()->meta->message);
    $this->assertEquals('false', $response->getData()->meta->success);
    $this->assertEquals(intval(Response::HTTP_BAD_REQUEST), $response->getData()->meta->code);
    $this->assertNull($response->getData()->result);
  }

  public function testUnauthenticatedResponse()
  {
    $response = ApiResponse::unAuthenticated(
      null,
      'Unauthenticated',
      'false',
      intval(Response::HTTP_UNAUTHORIZED)
    );

    $this->assertEquals(intval(Response::HTTP_UNAUTHORIZED), $response->getStatusCode());
    $this->assertEquals('Unauthenticated', $response->getData()->meta->message);
    $this->assertEquals('false', $response->getData()->meta->success);
    $this->assertEquals(intval(Response::HTTP_UNAUTHORIZED), $response->getData()->meta->code);
    $this->assertNull($response->getData()->result);
  }

  public function testForbiddenResponse()
  {
    $response = ApiResponse::forbidden(
      null,
      'Forbidden',
      'false',
      intval(Response::HTTP_FORBIDDEN)
    );

    $this->assertEquals(intval(Response::HTTP_FORBIDDEN), $response->getStatusCode());
    $this->assertEquals('Forbidden', $response->getData()->meta->message);
    $this->assertEquals('false', $response->getData()->meta->success);
    $this->assertEquals(intval(Response::HTTP_FORBIDDEN), $response->getData()->meta->code);
    $this->assertNull($response->getData()->result);
  }

  public function testNotFoundResponse()
  {
    $response = ApiResponse::notFound(
      null,
      'Not Found',
      'false',
      intval(Response::HTTP_NOT_FOUND)
    );

    $this->assertEquals(intval(Response::HTTP_NOT_FOUND), $response->getStatusCode());
    $this->assertEquals('Not Found', $response->getData()->meta->message);
    $this->assertEquals('false', $response->getData()->meta->success);
    $this->assertEquals(intval(Response::HTTP_NOT_FOUND), $response->getData()->meta->code);
    $this->assertNull($response->getData()->result);
  }

  public function testMethodNotAllowedResponse()
  {
    $response = ApiResponse::methodNotAllowed(
      null,
      'Method Not Allowed',
      'false',
      intval(Response::HTTP_METHOD_NOT_ALLOWED)
    );

    $this->assertEquals(intval(Response::HTTP_METHOD_NOT_ALLOWED), $response->getStatusCode());
    $this->assertEquals('Method Not Allowed', $response->getData()->meta->message);
    $this->assertEquals('false', $response->getData()->meta->success);
    $this->assertEquals(intval(Response::HTTP_METHOD_NOT_ALLOWED), $response->getData()->meta->code);
    $this->assertNull($response->getData()->result);
  }

  public function testFailedValidationResponse()
  {
    $response = ApiResponse::failedValidation(
      null,
      'Unprocessable Entity',
      'false',
      intval(Response::HTTP_UNPROCESSABLE_ENTITY)
    );

    $this->assertEquals(intval(Response::HTTP_UNPROCESSABLE_ENTITY), $response->getStatusCode());
    $this->assertEquals('Unprocessable Entity', $response->getData()->meta->message);
    $this->assertEquals('false', $response->getData()->meta->success);
    $this->assertEquals(intval(Response::HTTP_UNPROCESSABLE_ENTITY), $response->getData()->meta->code);
    $this->assertNull($response->getData()->result);
  }
}
