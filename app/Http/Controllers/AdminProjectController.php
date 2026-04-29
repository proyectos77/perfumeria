<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class AdminProjectController extends Controller
{
    public function index(): View
    {
        return view('admin.projects.index', [
            'projects' => Project::query()->ordered()->paginate(12),
        ]);
    }

    public function create(): View
    {
        return view('admin.projects.create', [
            'project' => new Project([
                'status' => Project::STATUS_PUBLISHED,
                'is_featured' => true,
            ]),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validateProject($request);

        if ($request->hasFile('image_path')) {
            $validated['image_path'] = $request->file('image_path')->store('projects', 'public');
        }

        Project::query()->create($validated);

        return redirect()
            ->route('admin.projects.index')
            ->with('success', 'El proyecto fue creado correctamente.');
    }

    public function edit(Project $project): View
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project): RedirectResponse
    {
        $validated = $this->validateProject($request, $project);

        if ($request->hasFile('image_path')) {
            $this->deleteManagedFile($project->image_path);
            $validated['image_path'] = $request->file('image_path')->store('projects', 'public');
        } else {
            unset($validated['image_path']);
        }

        $project->update($validated);

        return redirect()
            ->route('admin.projects.edit', $project)
            ->with('success', 'El proyecto fue actualizado correctamente.');
    }

    public function destroy(Project $project): RedirectResponse
    {
        $this->deleteManagedFile($project->image_path);
        $project->delete();

        return redirect()
            ->route('admin.projects.index')
            ->with('success', 'El proyecto fue eliminado correctamente.');
    }

    private function validateProject(Request $request, ?Project $project = null): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => [
                'nullable',
                'string',
                'max:255',
                Rule::unique('projects', 'slug')->ignore($project?->id),
            ],
            'client_name' => ['nullable', 'string', 'max:255'],
            'summary' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'project_url' => ['nullable', 'url', 'max:255'],
            'completed_at' => ['nullable', 'date'],
            'display_order' => ['nullable', 'integer', 'min:0'],
            'status' => ['required', Rule::in([Project::STATUS_DRAFT, Project::STATUS_PUBLISHED])],
            'is_featured' => ['nullable', 'boolean'],
            'image_path' => ['nullable', 'image', 'max:4096'],
        ]) + [
            'is_featured' => $request->boolean('is_featured'),
            'display_order' => (int) $request->input('display_order', 0),
        ];
    }

    private function deleteManagedFile(?string $path): void
    {
        if (blank($path)) {
            return;
        }

        $normalizedPath = ltrim((string) $path, '/');

        if (str_starts_with($normalizedPath, 'projects/')) {
            Storage::disk('public')->delete($normalizedPath);
        }
    }
}
