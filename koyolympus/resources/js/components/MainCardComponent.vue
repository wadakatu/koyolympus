<template>
    <div class="col">
        <div class="card landscape">
            <h5>Landscape</h5>
            <p>The landscape are there, and I just take them.</p>
        </div>
        <div class="card animal">
            <h5>Animal</h5>
            <p>If you want to be a better animal photographer, stand in front of more animals.</p>
        </div>
        <div class="card portrait">
            <h5>Portrait</h5>
            <p>The whole point of taking portraits is so that I can see how far people have come.</p>
        </div>
        <div class="card others">
            <h5>Others</h5>
            <p>The Earth is art, The photographer is only a witness.</p>
        </div>
    </div>
</template>

<script>

</script>

<style scoped>

.col {
    flex-basis: 50%;
}

.card {
    width: 200px;
    height: 230px;
    display: inline-block;
    border-radius: 10px;
    padding: 15px 25px;
    box-sizing: border-box;
    cursor: pointer;
    margin: 15px 0 15px 50px;
    background-position: center;
    background-size: cover;
    vertical-align: bottom;
    transition: transform 0.5s;
}

.landscape {
    background-image: url('/images/yellow.jpeg');
}

.animal {
    background-image: url('/images/cat.jpeg');
}

.portrait {
    background-image: url('/images/portrait.jpeg');
}

.others {
    background-image: url('/images/wine.jpeg');
}

.card:hover {
    transform: translateY(-10px);
}

h5 {
    color: #fff;
    text-shadow: 0 0 5px #999;
}

p {
    color: #fff;
    font-size: 11px;
    text-shadow: 0 0 15px #000;
}

</style>
