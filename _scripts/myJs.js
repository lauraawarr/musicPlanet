
 function getRandomPosition(element) {
  var x = document.body.offsetHeight-element.clientHeight;
  var y = document.body.offsetWidth-element.clientWidth;
  var randomX = Math.floor(Math.random()*x);
  var randomY = Math.floor(Math.random()*y);
  return [randomX,randomY];
}

window.onload = function() {

  var p = document.querySelectorAll('p');
  for(var i=0; i<p.length; i++){
  var xy = getRandomPosition(p[i]);
  p[i].style.top = xy[0] + 'px';
  p[i].style.left = xy[1] + 'px';
};
}