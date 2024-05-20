<?php

namespace App\Http\Controllers\Core\Book;

use App\Sources\Book\Application\UBookPublish;
use App\Sources\Book\Domain\Exceptions\BookNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

/**
 * HTTP Controller for publishing the book
 */
class BookPublishController extends BaseController
{
    public function __construct(
        private readonly UBookPublish $case
    )
    {
    }

    /**
     * @OA\Patch (
     *     description="Publish a book",
     *     path="/api/books",
     *      @OA\RequestBody(
     *           description="Book model",
     *           required=true,
     *           @OA\JsonContent(
     *                   @OA\Property (
     *                     property="uuid",
     *                     description="Uuid",
     *                     type="string"
     *                   ),
     *                   @OA\Property (
     *                      property="publisher",
     *                      description="Publisher",
     *                      type="string"
     *                    ),
     *           )
     *       ),
     *     @OA\Response(response="200", description="The book successfully deleted",@OA\JsonContent()),
     *     @OA\Response(response="422", description="Invalid parameters",@OA\JsonContent())
     *  )
     *
     * @param Request $request
     * @return JsonResponse
     * @throws BookNotFoundException
     */
    public function __invoke(Request $request): JsonResponse
    {
        $request->validate([
           'uuid' => 'required|uuid',
           'publisher' => 'required|string',
        ]);

        return response()->json([
            'success' => true,
            'book' => $this->case->__invoke(
                $request->get('uuid'),
                $request->get('publisher')
            )?->toPrimitives()
        ]);
    }
}
