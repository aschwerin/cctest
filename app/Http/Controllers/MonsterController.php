<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Monster;
use App\Repositories\MonsterRepository;

class MonsterController extends Controller
{
    protected $monsters;

    public function __construct(MonsterRepository $monsters)
    {
        $this->middleware('auth');
        $this->middleware('active');

        $this->monsters = $monsters;
    }

    /**
     * Display a list of all the DM's monsters.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        return view('monsters.index', [
            'monsters' => $this->monsters->forUser($request->user()),
        ]);
    }

    /**
     * Display a form for adding a DM monster.
     *
     * @return Response
     */
    public function add()
    {
        return view('monsters.add');
    }

    /**
     * Create a new character.
     *
     * @param Request $request
     * @return Response
     */
    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'max:255',
            'class' => 'required',
            'level' => 'required|Numeric|max:25',
            'race' => 'required',
            'str' => 'required|Numeric|max:25',
            'dex' => 'required|Numeric|max:25',
            'con' => 'required|Numeric|max:25',
            'int' => 'required|Numeric|max:25',
            'wis' => 'required|Numeric|max:25',
            'cha' => 'required|Numeric|max:25',
            'armor' => 'required|Numeric|max:25',
            'image' => 'max:255|image'
        ] );

//        echo '<pre>';
//        var_dump($request->file('image'));
//        echo '</pre>';
//        exit();

        $monster = new Monster();
        $monster->user_id = $request->user()->id;
        $monster->name = $request->name;
        $monster->class = $request->class;
        $monster->level = (int)$request->level;
        $monster->race = $request->race;
        $monster->alignment = $request->alignment;
        $monster->exp = (int)$request->exp;
        $monster->str = (int)$request->str;
        $monster->dex = (int)$request->dex;
        $monster->con = (int)$request->con;
        $monster->int = (int)$request->int;
        $monster->wis = (int)$request->wis;
        $monster->cha = (int)$request->cha;
        $monster->armor = (int)$request->armor;
        $monster->initiative = (int)$request->initiative;
        $monster->speed = (int)$request->speed;
        $monster->hit_points = (int)$request->hit_points;
        $monster->equipment = $request->equipment;
        $monster->other_proficiencies_langs = $request->other_proficiencies_langs;
        $monster->notes = $request->notes;
        $monster->save();

        $destinationPath = public_path(). '/images/monsters/'. $monster->id;

        if (!empty($request->file('image'))) {

            $request->file('image')->move(
                $destinationPath, $request->file('image')->getClientOriginalName()
            );

            $character->image_name = $request->file('image')->getClientOriginalName();
            $character->image_path = $destinationPath;

            $character->update();
        }

        return redirect('/monster');
    }

    public function edit(Monster $monster)
    {
        $this->authorize('edit', $monster);
        return view ('monsters.edit',
            [
                'monster' => $monster,
            ]
        );
    }

    /**
     * Update an existing monster.
     *
     * @param Request $request
     * @param Monster $monster
     * @return Response
     */
    public function update(Request $request, Monster $monster)
    {
        $this->validate($request, [
            'name' => 'max:255',
            'class' => 'required',
            'level' => 'required|Numeric|max:25',
            'race' => 'required',
            'str' => 'required|Numeric|max:25',
            'dex' => 'required|Numeric|max:25',
            'con' => 'required|Numeric|max:25',
            'int' => 'required|Numeric|max:25',
            'wis' => 'required|Numeric|max:25',
            'cha' => 'required|Numeric|max:25',
            'armor' => 'required|Numeric|max:25',
            'image' => ['max:255',
                'mimes:png,jpg,jpeg,gif']
        ] );

        $destinationPath = public_path(). '/images/monsters/'. $monster->id;

//        echo '<pre>';
//        var_dump($request->file('image'));
//        echo '<br/>';
//        var_dump(file_exists($destinationPath));
//        echo '</pre>';
//        exit();

        $monster->name = $request->name;
        $monster->class = $request->class;
        $monster->level = (int)$request->level;
        $monster->race = $request->race;
        $monster->background = $request->background;
        $monster->alignment = $request->alignment;
        $monster->exp = (int)$request->exp;
        $monster->str = (int)$request->str;
        $monster->dex = (int)$request->dex;
        $monster->con = (int)$request->con;
        $monster->int = (int)$request->int;
        $monster->wis = (int)$request->wis;
        $monster->cha = (int)$request->cha;
        $monster->inspiration = $request->inspiration;
        $monster->armor = (int)$request->armor;
        $monster->initiative = (int)$request->initiative;
        $monster->speed = (int)$request->speed;
        $monster->hit_points = (int)$request->hit_points;
        $monster->personality_traits = $request->personality_traits;
        $monster->ideals = $request->ideals;
        $monster->bonds = $request->bonds;
        $monster->flaws = $request->flaws;
        $monster->equipment = $request->equipment;
        $monster->other_proficiencies_langs = $request->other_proficiencies_langs;
        $monster->notes = $request->notes;
        $monster->image_name = $request->file('image')->getClientOriginalName();
        $monster->image_path = $destinationPath;

        $monster->update();

        if (!empty($request->file('image'))) {

            $request->file('image')->move(
                $destinationPath, $request->file('image')->getClientOriginalName()
            );
        }

        return redirect('/monster');
    }

    /**
     * Destroy the given monster.
     *
     * @param Request $request
     * @param Monster $monster
     * @return Response
     */
    public function destroy(Request $request, Monster $monster)
    {
        $this->authorize('destroy', $monster);

        $monster->delete();

        return redirect('/monster');
    }

    public function getAll()
    {
        $monsters = Monster::all();
        return view('monsters.all', [
            'monsters' => $monsters
        ]);
    }

    public function view(Monster $monster)
    {
        return view('monsters.view', [
            'monster' => $monster
        ]);
    }

    public function getName()
    {
        $first_syllables = array('ah', 'ad', 'ak', 'al',
            'ba', 'bra', 'bri',
            'don', 'dee', 'ed', 'em', 'en', 'ee', 'eff', 'ell', 'g',
            'kay', 'kah', 'oh', 'ess',
            'rr', 'shi', 'fay', 'mon', 'ler', 'ron', 'th', 'wil', 'exe', 'yr', 'eze', 'una', 'uno');
        $last_syllables = array('black', 'forest', 'red', 'sea', 'stan', 'stone', 'brick', 'sky', 'moon', 'shadow',
            'beam', 'sun', 'green', 'blue', 'earth', 'wood');
        unset($num_syllables);
        $num_syllables = mt_rand(2, 4);
        $first_name = '';
        for ($i = 0; $i < $num_syllables; $i++) {
            $first_name .= $first_syllables[mt_rand(0, sizeof($first_syllables) - 1)];
        }
        unset($num_syllables2);
        $num_syllables2 = mt_rand(1, 2);
        $last_name = '';
        for ($i = 0; $i < $num_syllables2; $i++) {
            $last_name .= $last_syllables[mt_rand(0, sizeof($last_syllables) - 1)];
        }
        return ucfirst($first_name) . " " . ucfirst($last_name);

    }
}
