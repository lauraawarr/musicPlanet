function getRandomPosition(element) {
  var x = document.body.offsetWidth-element.clientWidth;
  var y = document.body.offsetHeight-element.clientHeight;

  var img = document.querySelector('.img');
  var imgW = img.clientWidth;

  var newX = x - imgW -element.clientWidth;
  var posX = img.getBoundingClientRect().left;
  var newY = img.getBoundingClientRect().bottom -element.clientWidth;
  var tempX = Math.floor(Math.random()*newX);

  var randomX = (tempX >= posX-element.clientWidth) ? tempX + imgW + element.clientWidth: tempX;
  var randomY = Math.floor(Math.random()*newY);

  return [randomX,randomY];
}

window.onload = function() {

  var p = document.querySelectorAll('p');
  for(var i=0; i<p.length; i++){
    var xy = getRandomPosition(p[i]);
    p[i].style.left = xy[0] + 'px';
    p[i].style.top = xy[1] + 'px';
  };

};