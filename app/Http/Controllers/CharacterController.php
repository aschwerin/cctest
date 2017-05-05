<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Character;
use App\Repositories\CharacterRepository;

class CharacterController extends Controller
{
    protected $characters;

    public function __construct(CharacterRepository $characters)
    {
        $this->middleware('auth');
        $this->middleware('active');

        $this->characters = $characters;
    }

    /**
     * Display a list of all the user's characters.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
//        $characters = Character::where('user_id', $request->user()->id->get());
//        echo '<pre>';
//        var_dump($characters);
//        echo '</pre>';
//        exit();
        return view('characters.index', [
            'characters' => $this->characters->forUser($request->user()),
        ]);
    }

    /**
     * Display a form for adding a user character.
     *
     * @return Response
     */
    public function add()
    {
        return view('characters.add');
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
            'name' => 'required|max:255',
            'class' => 'required',
            'race' => 'required',
            'alignment' => 'required',
            'image' => 'max:255|image'
        ] );

//        echo '<pre>';
//        var_dump($request->file('image'));
//        echo '</pre>';
//        exit();

        $character = new Character();
        $character->user_id = $request->user()->id;
        $character->name = $request->name;
        $character->class = $request->class;
        $character->level = (int)$request->level;
        $character->race = $request->race;
        $character->background = $request->background;
        $character->alignment = $request->alignment;
        $character->exp = (int)$request->exp;
        $character->str = (int)$request->str;
        $character->dex = (int)$request->dex;
        $character->con = (int)$request->con;
        $character->int = (int)$request->int;
        $character->wis = (int)$request->wis;
        $character->cha = (int)$request->cha;
        $character->inspiration = $request->inspiration;
        $character->armor = (int)$request->armor;
        $character->initiative = (int)$request->initiative;
        $character->speed = (int)$request->speed;
        $character->hit_points = (int)$request->hit_points;
        $character->personality_traits = $request->personality_traits;
        $character->ideals = $request->ideals;
        $character->bonds = $request->bonds;
        $character->flaws = $request->flaws;
        $character->equipment = $request->equipment;
        $character->other_proficiencies_langs = $request->other_proficiencies_langs;
        $character->notes = $request->notes;
        $character->save();

        $destinationPath = public_path(). '/images/characters/'. $character->id;

        if (!empty($request->file('image'))) {

            $request->file('image')->move(
                $destinationPath, $request->file('image')->getClientOriginalName()
            );

            $character->image_name = $request->file('image')->getClientOriginalName();
            $character->image_path = $destinationPath;

            $character->update();
        }




//        $request->user()->characters()->create([
//            'name' => $request->name,
//            'class' => $request->class,
//            'level' => (int)$request->level,
//            'race' => $request->race,
//            'background' => $request->background,
//            'alignment' => $request->alignment,
//            'exp' => (int)$request->exp,
//            'str' => (int)$request->str,
//            'dex' => (int)$request->dex,
//            'con' => (int)$request->con,
//            'int' => (int)$request->int,
//            'wis' => (int)$request->wis,
//            'cha' => (int)$request->cha,
//            'inspiration' => $request->inspiration,
//            'armor' => (int)$request->armor,
//            'initiative' => (int)$request->initiative,
//            'speed' => (int)$request->speed,
//            'hit_points' => (int)$request->hit_points,
//            'personality_traits' => $request->personality_traits,
//            'ideals' => $request->ideals,
//            'bonds' => $request->bonds,
//            'flaws' => $request->flaws,
//            'equipment' => $request->equipment,
//            'other_proficiencies_langs' => $request->other_proficiencies_langs,
//            'notes' => $request->notes
//        ]);

        return redirect('/character');
    }

    public function edit(Character $character)
    {
        $this->authorize('edit', $character);
        return view ('characters.edit',
            [
                'character' => $character,
            ]
        );
    }

    /**
     * Update an existing character.
     *
     * @param Request $request
     * @param Character $character
     * @return Response
     */
    public function update(Request $request, Character $character)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'class' => 'required',
            'race' => 'required',
            'alignment' => 'required',
            'image' => ['max:255',
                'mimes:png,jpg,jpeg,gif']
        ] );

        $destinationPath = public_path(). '/images/characters/'. $character->id;

//        echo '<pre>';
//        var_dump($request->file('image'));
//        echo '<br/>';
//        var_dump(file_exists($destinationPath));
//        echo '</pre>';
//        exit();

        $character->name = $request->name;
        $character->class = $request->class;
        $character->level = (int)$request->level;
        $character->race = $request->race;
        $character->background = $request->background;
        $character->alignment = $request->alignment;
        $character->exp = (int)$request->exp;
        $character->str = (int)$request->str;
        $character->dex = (int)$request->dex;
        $character->con = (int)$request->con;
        $character->int = (int)$request->int;
        $character->wis = (int)$request->wis;
        $character->cha = (int)$request->cha;
        $character->inspiration = $request->inspiration;
        $character->armor = (int)$request->armor;
        $character->initiative = (int)$request->initiative;
        $character->speed = (int)$request->speed;
        $character->hit_points = (int)$request->hit_points;
        $character->personality_traits = $request->personality_traits;
        $character->ideals = $request->ideals;
        $character->bonds = $request->bonds;
        $character->flaws = $request->flaws;
        $character->equipment = $request->equipment;
        $character->other_proficiencies_langs = $request->other_proficiencies_langs;
        $character->notes = $request->notes;
        $character->image_name = $request->file('image')->getClientOriginalName();
        $character->image_path = $destinationPath;

        $character->update();

        if (!empty($request->file('image'))) {

            $request->file('image')->move(
                $destinationPath, $request->file('image')->getClientOriginalName()
            );
        }

        return redirect('/character');
    }

    /**
     * Destroy the given character.
     *
     * @param Request $request
     * @param Character $character
     * @return Response
     */
    public function destroy(Request $request, Character $character)
    {
        $this->authorize('destroy', $character);

        $character->delete();

        return redirect('/character');
    }

    public function getAll()
    {
        $characters = Character::all();
        return view('characters.all', [
            'characters' => $characters
        ]);
    }

    public function view(Character $character)
    {
        return view('characters.view', [
            'character' => $character
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
