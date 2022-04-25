let colors = [ 'orange', 'yellow', 'green', 'blue', 'purple', 'black', 'grey','brown', 'aquamarine', 'violet', 'scarlet', 'pink',
'blueviolet ', ' cadetblue' , 'chartreuse ','cornflowerblue ', 'crimson ' , 'cyan ', 'darkcyan ', ' indianred' , 'hotpink ', 
'lightseagreen ', ' lightsalmon' , 'turquoise ', 'springgreen'];


let button = document.getElementById('button');


button.addEventListener('click', function(){
    
    var randomColor = colors[Math.floor(Math.random() * colors.length)]
    
    let container = document.getElementById('container');

    container.style.background = randomColor;
})