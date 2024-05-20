<?php

namespace App\Http\Controllers\Core\Book;

use App\Http\Controllers\Controller;
use App\Sources\Book\Application\UBookUpSert;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * HTTP Controller for ADDING a new book
 */
class BookInsertController extends Controller
{
    public function __construct(
        private readonly UBookUpSert $case
    )
    {
    }


    /**
     * @OA\Put (
     *    description="Create a book",
     *    path="/api/books",
     *     @OA\RequestBody(
     *          description="Book model",
     *          required=true,
     *          @OA\JsonContent(
     *                  @OA\Property (
     *                    property="title",
     *                    description="Title",
     *                    type="string"
     *                  ),
     *                  @OA\Property (
     *                    property="author",
     *                    description="Author",
     *                    type="string"
     *                  ),
     *                  @OA\Property(
     *                    property="genre",
     *                    description="Genre",
     *                    type="string"
     *                  ),
     *                   @OA\Property(
     *                     property="publisher",
     *                     description="Publisher",
     *                     type="string"
     *                   ),
     *                   @OA\Property(
     *                     property="amount",
     *                     description="Amount",
     *                     type="integer"
     *                   ),
     *                   @OA\Property(
     *                      property="price",
     *                      description="Price",
     *                      type="integer"
     *                    ),
     *          )
     *      ),
     *    @OA\Response(response="200", description="The book successfully added",@OA\JsonContent()),
     *    @OA\Response(response="422", description="Invalid parameters",@OA\JsonContent())
     * )
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function __invoke(Request $request): JsonResponse
    {
        $request->validate([
            'title' => 'required|string',
            'author' => 'required|string',
            'genre' => 'required|string',
            'amount' => 'required|numeric|min:0',
            'price' => 'required|numeric|min:0',
        ]);
        return response()->json([
            'success' => true,
            'book' => $this->case->__invoke(
                null,
                $request->get('title'),
                $request->get('publisher') ?? '',
                $request->get('author'),
                $request->get('genre'),
                $request->get('amount'),
                $request->get('price'),
                $request->get('publication') ?? null,
            )->toPrimitives()
        ]);
    }
}
