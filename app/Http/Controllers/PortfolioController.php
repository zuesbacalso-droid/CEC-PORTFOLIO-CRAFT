<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PortfolioController extends Controller
{
    public function publicShow(Portfolio $portfolio){
        $data=$portfolio->data;
        return view('public-portfolio',compact('portfolio','data'));
    }

    public function index(Request $request): JsonResponse
    {
        return response()->json(
            Portfolio::query()->where('user_id', $request->user()->id)->latest()->get()->map(fn (Portfolio $portfolio) => $this->toArray($portfolio))
        );
    }

    public function store(Request $request): JsonResponse
    {
        $data = $this->validatedData($request);
        $portfolio = Portfolio::create([
            'id' => (string) Str::uuid(),
            'user_id' => $request->user()->id,
            'full_name' => $data['fullName'],
            'email' => $data['email'],
            'data' => $data,
        ]);

        return response()->json($this->toArray($portfolio), 201);
    }

    public function update(Request $request, Portfolio $portfolio): JsonResponse
    {
        abort_unless($portfolio->user_id === $request->user()->id, 404);
        $data = $this->validatedData($request);
        $portfolio->update([
            'full_name' => $data['fullName'],
            'email' => $data['email'],
            'data' => $data,
        ]);

        return response()->json($this->toArray($portfolio->refresh()));
    }

    public function destroy(Request $request, Portfolio $portfolio): JsonResponse
    {
        abort_unless($portfolio->user_id === $request->user()->id, 404);
        $portfolio->delete();

        return response()->json(['message' => 'Portfolio deleted.']);
    }


    public function trash(Request $request): JsonResponse
    {
        return response()->json(Portfolio::onlyTrashed()->where('user_id', $request->user()->id)->latest('deleted_at')->get()->map(fn (Portfolio $p) => [...$this->toArray($p), 'deletedAt' => $p->deleted_at]));
    }

    public function restore(Request $request, string $id): JsonResponse
    {
        $portfolio = Portfolio::onlyTrashed()->where('user_id', $request->user()->id)->findOrFail($id);
        $portfolio->restore();
        return response()->json($this->toArray($portfolio->refresh()));
    }

    public function forceDelete(Request $request, string $id): JsonResponse
    {
        $portfolio = Portfolio::onlyTrashed()->where('user_id', $request->user()->id)->findOrFail($id);
        $portfolio->forceDelete();
        return response()->json(['message' => 'Portfolio permanently deleted.']);
    }

    private function validatedData(Request $request): array
    {
        return $request->validate([
            'fullName' => ['required', 'string', 'max:255', 'regex:/^[^0-9]+$/u'],
            'jobTitle' => ['required', 'string', 'max:255', 'regex:/^[^0-9]+$/u'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50'],
            'address' => ['nullable', 'string', 'max:255'],
            'profilePic' => ['nullable', 'string', 'max:500000'],
            'aboutMe' => ['required', 'string', 'max:5000'],
            'eduSchool' => ['nullable', 'string', 'max:255'],
            'eduDegree' => ['nullable', 'string', 'max:255'],
            'eduYear' => ['nullable', 'string', 'max:100'],
            'skills' => ['present', 'array', 'max:100'],
            'skills.*' => ['string', 'max:100'],
            'projects' => ['present', 'array', 'max:100'],
            'projects.*.title' => ['required', 'string', 'max:255'],
            'projects.*.desc' => ['nullable', 'string', 'max:2000'],
            'projects.*.link' => ['nullable', 'url', 'max:2048'],
            'experience' => ['present', 'array', 'max:100'],
            'experience.*.company' => ['nullable', 'string', 'max:255'],
            'experience.*.role' => ['nullable', 'string', 'max:255'],
            'experience.*.duration' => ['nullable', 'string', 'max:100'],
            'experience.*.desc' => ['nullable', 'string', 'max:2000'],
            'template' => ['nullable', 'in:simple,modern,creative'],
            'socialGithub' => ['nullable', 'url', 'max:2048'],
            'socialLinkedin' => ['nullable', 'url', 'max:2048'],
            'socialWebsite' => ['nullable', 'url', 'max:2048'],
        ]);
    }

    private function toArray(Portfolio $portfolio): array
    {
        return [...$portfolio->data, 'id' => $portfolio->id];
    }
}