<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExperienceRequest;
use App\Models\Experience;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ExperienceController extends Controller
{
	public function index(Request $request): Response
	{
		$search = trim((string) $request->query('search', ''));
		$employmentType = trim((string) $request->query('employment_type', 'all'));

		$experiencesQuery = Experience::query()
			->when($search !== '', function ($query) use ($search) {
				$query->where(function ($nestedQuery) use ($search) {
					$nestedQuery->where('position', 'like', '%' . $search . '%')
						->orWhere('company', 'like', '%' . $search . '%')
						->orWhere('location', 'like', '%' . $search . '%')
						->orWhere('description', 'like', '%' . $search . '%');
				});
			})
			->when($employmentType !== 'all' && $employmentType !== '', fn ($query) => $query->where('employment_type', $employmentType));

		$experiences = $experiencesQuery
			->orderByDesc('start_date')
			->orderByDesc('created_at')
			->paginate(10)
			->withQueryString();

		$experiences->getCollection()->transform(fn (Experience $experience) => $this->experiencePayload($experience));

		return Inertia::render('Admin/Experiences/Index', [
			'experiences' => $experiences,
			'filters' => [
				'search' => $search,
				'employment_type' => $employmentType,
			],
			'filterOptions' => [
				'employment_types' => ['all', 'Full-time', 'Part-time', 'Contract', 'Internship', 'Freelance'],
			],
		]);
	}

	public function create(): Response
	{
		return Inertia::render('Admin/Experiences/Create', [
			'experience' => $this->emptyExperiencePayload(),
		]);
	}

	public function store(ExperienceRequest $request): RedirectResponse
	{
		$data = $request->validated();

		$experience = new Experience();
		$this->fillExperience($experience, $data);
		$experience->save();

		return redirect()->route('admin.experiences.index')->with('success', 'Experience created successfully.');
	}

	public function edit(Experience $experience): Response
	{
		return Inertia::render('Admin/Experiences/Edit', [
			'experience' => $this->experiencePayload($experience),
		]);
	}

	public function update(ExperienceRequest $request, Experience $experience): RedirectResponse
	{
		$data = $request->validated();

		$this->fillExperience($experience, $data);
		$experience->save();

		return redirect()->route('admin.experiences.edit', $experience)->with('success', 'Experience updated successfully.');
	}

	public function destroy(Experience $experience): RedirectResponse
	{
		$experience->delete();

		return redirect()->route('admin.experiences.index')->with('success', 'Experience deleted successfully.');
	}

	private function fillExperience(Experience $experience, array $data): void
	{
		$experience->position = $data['position'];
		$experience->company = $data['company'];
		$experience->company_link = $data['company_link'] ?? null;
		$experience->location = $data['location'] ?? null;
		$experience->start_date = $data['start_date'];
		$experience->end_date = $data['end_date'] ?? null;
		$experience->employment_type = $data['employment_type'];
		$experience->description = $data['description'] ?? null;
		$experience->highlights = $this->normalizeTextList($data['highlights'] ?? []);
		$experience->tech_stack = $this->normalizeTextList($data['tech_stack'] ?? []);
	}

	private function experiencePayload(Experience $experience): array
	{
		return [
			'id' => $experience->id,
			'position' => $experience->position,
			'company' => $experience->company,
			'company_link' => $experience->company_link,
			'location' => $experience->location,
			'start_date' => $experience->start_date?->format('Y-m-d') ?? '',
			'end_date' => $experience->end_date?->format('Y-m-d') ?? '',
			'employment_type' => $experience->employment_type,
			'description' => $experience->description,
			'highlights' => array_values($experience->highlights ?? []),
			'tech_stack' => array_values($experience->tech_stack ?? []),
		];
	}

	private function emptyExperiencePayload(): array
	{
		return [
			'id' => null,
			'position' => '',
			'company' => '',
			'company_link' => '',
			'location' => '',
			'start_date' => '',
			'end_date' => '',
			'employment_type' => 'Full-time',
			'description' => '',
			'highlights' => [],
			'tech_stack' => [],
		];
	}

	private function normalizeTextList(array $values): array
	{
		return array_values(array_filter(array_map(function ($value) {
			if (is_string($value)) {
				return trim($value);
			}

			if (is_numeric($value)) {
				return trim((string) $value);
			}

			return null;
		}, $values)));
	}
}