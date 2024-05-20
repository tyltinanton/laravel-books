<?php

namespace App\Http\Controllers\Core\Book;

use App\Http\Controllers\Controller;
use App\Sources\Book\Application\UBookDelete;
use App\Sources\Book\Domain\Exceptions\BookNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * HTTP controller for deleting the book by UUID
 *
 * DELETE /api/books
 *
 */
class BookDeleteController extends Controller
{
    public function __construct(
        private readonly UBookDelete $case
    )
    {
    }

    /**
     * @OA\Delete (
     *     description="Delete the book",
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
     *           )
     *       ),
     *     @OA\Response(response="200", description="Book successfully deleted",@OA\JsonContent()),
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
        ]);

        $this->case->__invoke($request->get('uuid'));

        return response()->json([
            'success' => true,
        ]);
    }
}
