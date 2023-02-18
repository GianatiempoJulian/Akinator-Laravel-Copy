<?php

namespace App\Http\Controllers;

use App\Models\Tree;
use Illuminate\Http\Request;

class TreeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $node = Tree::inRandomOrder()->where('isQuestion', 1)->first()->node;

        if (isset($_GET['n'])) {
            $node = $_GET['n'];
        }

        $nodeYes = $node * 2;
        $nodeNo = $node * 2 + 1;


        ///Traemos el nodo///


        $answer = Tree::where('node', $node)->get();
        $text = '';
        $isQuestion = true;

        foreach ($answer as $row) {
            $text = $row->text;
            $isQuestion = $row->isQuestion;
        }

        /// Fin traemos el nodo///


        return view('index', compact('node', 'nodeYes', 'nodeNo','text','isQuestion'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $node = $request['node'];
        $name = $request['name'];
        $previous_name = $request['previousName'];
        $description = $request['description'];

        $nodeChildLeft = $node * 2;
        $nodeChildRight = $nodeChildLeft + 1;

        $nameChildLeft = $name;
        $nameChildRight = $previous_name;

        $question = $description;

        Tree::create([
            'node' => $nodeChildLeft,
            'text' => $nameChildLeft,
            'isQuestion' => false
        ]);

        Tree::create([
            'node' => $nodeChildRight,
            'text' => $nameChildRight,
            'isQuestion' => false
        ]);

        $old_node = Tree::where('node', $node)->first();
        $old_node->text = $question;
        $old_node->isQuestion = true;
        $old_node->update();

        return redirect('/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tree  $tree
     * @return \Illuminate\Http\Response
     */
    public function show(Tree $tree)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tree  $tree
     * @return \Illuminate\Http\Response
     */
    public function edit(Tree $tree)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tree  $tree
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tree $tree)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tree  $tree
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tree $tree)
    {
        //
    }

    public function final(){
        return view('final');
    }
}
