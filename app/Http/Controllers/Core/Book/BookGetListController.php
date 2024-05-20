<?php

namespace App\Http\Controllers\Core\Book;

use App\Http\Controllers\Controller;
use App\Sources\Book\Application\UBookGetList;
use App\Sources\Book\Domain\Book;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * @OA\Info(title="Library book API", version="0.1")
 */
class BookGetListController extends Controller
{
    public function __construct(
        private readonly UBookGetList $case
    )
    {
    }

    /**
     * @OA\Get (
     *    path="/api/books",
     *    @OA\Response(response="200", description="Book list successfully received")
     * )
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function __invoke(Request $request): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => $this->case->__invoke($request->get('search') ?? '')->map(fn(Book $book) => $book->toPrimitives()),
        ]);
    }
}
