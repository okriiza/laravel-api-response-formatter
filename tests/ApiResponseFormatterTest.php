<?php

namespace Tests\Unit\Okriiza\ApiResponseFormatter;

use Okriiza\ApiResponseFormatter\ApiResponseFormatter;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

/**
 * Class ApiResponseFormatterTest.
 *
 * @covers \Okriiza\ApiResponseFormatter\ApiResponseFormatter
 */
final class ApiResponseFormatterTest extends TestCase
{
  private ApiResponseFormatter $apiResponseFormatter;

  /**
   * {@inheritdoc}
   */
  protected function setUp(): void
  {
    parent::setUp();

    /** @todo Correctly instantiate tested object to use it. */
    $this->apiResponseFormatter = new ApiResponseFormatter();
  }

  /**
   * {@inheritdoc}
   */
  protected function tearDown(): void
  {
    parent::tearDown();

    unset($this->apiResponseFormatter);
  }

  public function testSuccessResponse()
  {
    $response = ApiResponseFormatter::success("success data", 'Success', true, Response::HTTP_OK);

    $this->assertEquals(Response::HTTP_OK, $response->getStatusCode());
    $this->assertEquals('Success', $response->getData()->meta->message);
    $this->assertEquals(true, $response->getData()->meta->success);
    $this->assertEquals(200, $response->getData()->meta->code);
    $this->assertEquals('success data', $response->getData()->result);
  }

  public function testCreatedResponse()
  {
    $response = ApiResponseFormatter::created(
      'created data',
      'Created',
      Response::HTTP_CREATED,
      true,
      Response::HTTP_CREATED
    );

    $this->assertEquals(Response::HTTP_CREATED, $response->getStatusCode());
    $this->assertEquals('Created', $response->getData()->meta->message);
    $this->assertEquals(true, $response->getData()->meta->success);
    $this->assertEquals(Response::HTTP_CREATED, $response->getData()->meta->code);
    $this->assertEquals('created data', $response->getData()->result);
  }

  public function testNoContentResponse()
  {
    $response = ApiResponseFormatter::noContent(
      null,
      'No Content',
      Response::HTTP_NO_CONTENT,
      true,
      Response::HTTP_NO_CONTENT
    );

    $this->assertEquals(Response::HTTP_NO_CONTENT, $response->getStatusCode());
    $this->assertEquals('No Content', $response->getData()->meta->message);
    $this->assertEquals(true, $response->getData()->meta->success);
    $this->assertEquals(Response::HTTP_NO_CONTENT, $response->getData()->meta->code);
    $this->assertNull($response->getData()->result);
  }

  public function testErrorResponse()
  {
    $response = ApiResponseFormatter::error(
      null,
      'Bad Request',
      Response::HTTP_BAD_REQUEST,
      false,
      Response::HTTP_BAD_REQUEST
    );

    $this->assertEquals(Response::HTTP_BAD_REQUEST, $response->getStatusCode());
    $this->assertEquals('Bad Request', $response->getData()->meta->message);
    $this->assertEquals(false, $response->getData()->meta->success);
    $this->assertEquals(Response::HTTP_BAD_REQUEST, $response->getData()->meta->code);
    $this->assertNull($response->getData()->result);
  }

  public function testUnauthenticatedResponse()
  {
    $response = ApiResponseFormatter::unAuthenticated(
      null,
      'Unauthenticated',
      Response::HTTP_UNAUTHORIZED,
      false,
      Response::HTTP_UNAUTHORIZED
    );

    $this->assertEquals(Response::HTTP_UNAUTHORIZED, $response->getStatusCode());
    $this->assertEquals('Unauthenticated', $response->getData()->meta->message);
    $this->assertEquals(false, $response->getData()->meta->success);
    $this->assertEquals(Response::HTTP_UNAUTHORIZED, $response->getData()->meta->code);
    $this->assertNull($response->getData()->result);
  }

  public function testForbiddenResponse()
  {
    $response = ApiResponseFormatter::forbidden(
      null,
      'Forbidden',
      Response::HTTP_FORBIDDEN,
      false,
      Response::HTTP_FORBIDDEN
    );

    $this->assertEquals(Response::HTTP_FORBIDDEN, $response->getStatusCode());
    $this->assertEquals('Forbidden', $response->getData()->meta->message);
    $this->assertEquals(false, $response->getData()->meta->success);
    $this->assertEquals(Response::HTTP_FORBIDDEN, $response->getData()->meta->code);
    $this->assertNull($response->getData()->result);
  }

  public function testNotFoundResponse()
  {
    $response = ApiResponseFormatter::notFound(
      null,
      'Not Found',
      Response::HTTP_NOT_FOUND,
      false,
      Response::HTTP_NOT_FOUND
    );

    $this->assertEquals(Response::HTTP_NOT_FOUND, $response->getStatusCode());
    $this->assertEquals('Not Found', $response->getData()->meta->message);
    $this->assertEquals(false, $response->getData()->meta->success);
    $this->assertEquals(Response::HTTP_NOT_FOUND, $response->getData()->meta->code);
    $this->assertNull($response->getData()->result);
  }

  public function testMethodNotAllowedResponse()
  {
    $response = ApiResponseFormatter::methodNotAllowed(
      null,
      'Method Not Allowed',
      Response::HTTP_METHOD_NOT_ALLOWED,
      false,
      Response::HTTP_METHOD_NOT_ALLOWED
    );

    $this->assertEquals(Response::HTTP_METHOD_NOT_ALLOWED, $response->getStatusCode());
    $this->assertEquals('Method Not Allowed', $response->getData()->meta->message);
    $this->assertEquals(false, $response->getData()->meta->success);
    $this->assertEquals(Response::HTTP_METHOD_NOT_ALLOWED, $response->getData()->meta->code);
    $this->assertNull($response->getData()->result);
  }
  public function testFailedValidationResponse()
  {
    $response = ApiResponseFormatter::failedValidation(
      null,
      'Unprocessable Entity',
      Response::HTTP_UNPROCESSABLE_ENTITY,
      false,
      Response::HTTP_UNPROCESSABLE_ENTITY
    );

    $this->assertEquals(Response::HTTP_UNPROCESSABLE_ENTITY, $response->getStatusCode());
    $this->assertEquals('Unprocessable Entity', $response->getData()->meta->message);
    $this->assertEquals(false, $response->getData()->meta->success);
    $this->assertEquals(Response::HTTP_UNPROCESSABLE_ENTITY, $response->getData()->meta->code);
    $this->assertNull($response->getData()->result);
  }
}
