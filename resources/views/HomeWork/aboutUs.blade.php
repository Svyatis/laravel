@extends('layouts.main')


@section('content')

        <p>About Us</p>
    Our Cosmic Neighborhood
From our small world we have gazed upon the cosmic ocean for thousands of years.
        Ancient astronomers observed points of light that appeared to move among the stars.
        They called these objects "planets," meaning wanderers, and named them after Roman
        deities—Jupiter, king of the gods; Mars, the god of war; Mercury, messenger of the gods;
        Venus, the goddes of love and beauty, and Saturn, father of Jupiter and god of agriculture.
        The stargazers also observed comets with sparkling tails, and meteors or shooting stars
        apparently falling from the sky.
Since the invention of the telescope, three more planets have been discovered in our solar system:
        Uranus (1781), Neptune (1846), and, now downgraded to a dwarf planet, Pluto (1930).
        In addition, there are thousands of small bodies such as asteroids and comets. Most of the
        asteroids orbit in a region between the orbits of Mars and Jupiter, while the home of comets
        lies far beyond the orbit of Pluto, in the Oort Cloud.

@endsection

@section('aside')

    <div class="imageDiv">
        <input class="images" type="image" src="{{ asset("images/3.jpg") }}">
        <input class="images" type="image" src="{{ asset("images/4.jpg") }}">
        <input class="images" type="image" src="{{ asset("images/5.jpg") }}">
        <br>
        <input class="images" type="image" src="{{ asset("images/6.jpg") }}">
        <input class="images" type="image" src="{{ asset("images/7.jpg") }}">
        <input class="images" type="image" src="{{ asset("images/8.jpg") }}">
        <br>
        <input class="images" type="image" src="{{ asset("images/1.jpg") }}">
        <input class="images" type="image" src="{{ asset("images/2.jpg") }}">
        <input class="images" type="image" src="{{ asset("images/9.jpg") }}">
    </div>

@endsection