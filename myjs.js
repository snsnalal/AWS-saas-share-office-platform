
//메인페이지 검색 주의문
function searchbutton(){
    alert("현재 검색 기능은 사용하실 수 없습니다.").innHtml;
}

//아티클 하이퍼링크
function thishyper(){
    alert("아직 페이지가 구현되지 않았습니다.");
    //location.href = "/index.html"; 추후 페이지 작성 후 변경 요망
}

function content(){
    alert("아직 구현되지 않았습니다.");
    //location.href = "/index.html"; 추후 페이지 작성 후 변경 요망
}




/*--------------------
Vars
--------------------*/
const $menu = document.querySelector('.menu');
const $items = document.querySelectorAll('.menu--item');
const $images = document.querySelectorAll('.menu--item img');
let menuWidth = $menu.clientWidth;
let itemWidth = $items[0].clientWidth;
let wrapWidth = $items.length * itemWidth;

let scrollSpeed = 0;
let oldScrollY = 0;
let scrollY = 0;
let y = 0;


/*--------------------
           Lerp
           --------------------*/
const lerp = (v0, v1, t) => {
  return v0 * (1 - t) + v1 * t;
};


/*--------------------
   Dispose
   --------------------*/
const dispose = scroll => {
  gsap.set($items, {
    x: i => {
      return i * itemWidth + scroll;
    },
    modifiers: {
      x: (x, target) => {
        const s = gsap.utils.wrap(-itemWidth, wrapWidth - itemWidth, parseInt(x));
        return `${s}px`;
      }
    }
  });


};
dispose(0);


/*--------------------
            Wheel
            --------------------*/
const handleMouseWheel = e => {
  scrollY -= e.deltaY * 0.9;
};


/*--------------------
   Touch
   --------------------*/
let touchStart = 0;
let touchX = 0;
let isDragging = false;
const handleTouchStart = e => {
  touchStart = e.clientX || e.touches[0].clientX;
  isDragging = true;
  $menu.classList.add('is-dragging');
};
const handleTouchMove = e => {
  if (!isDragging) return;
  touchX = e.clientX || e.touches[0].clientX;
  scrollY += (touchX - touchStart) * 2.5;
  touchStart = touchX;
};
const handleTouchEnd = () => {
  isDragging = false;
  $menu.classList.remove('is-dragging');
};


/*--------------------
   Listeners
   --------------------*/
$menu.addEventListener('mousewheel', handleMouseWheel);

$menu.addEventListener('touchstart', handleTouchStart);
$menu.addEventListener('touchmove', handleTouchMove);
$menu.addEventListener('touchend', handleTouchEnd);

$menu.addEventListener('mousedown', handleTouchStart);
$menu.addEventListener('mousemove', handleTouchMove);
$menu.addEventListener('mouseleave', handleTouchEnd);
$menu.addEventListener('mouseup', handleTouchEnd);

$menu.addEventListener('selectstart', () => {return false;});


/*--------------------
                                                              Resize
                                                              --------------------*/
window.addEventListener('resize', () => {
  menuWidth = $menu.clientWidth;
  itemWidth = $items[0].clientWidth;
  wrapWidth = $items.length * itemWidth;
});


/*--------------------
    Render
    --------------------*/
const render = () => {
  requestAnimationFrame(render);
  y = lerp(y, scrollY, .1);
  dispose(y);

  scrollSpeed = y - oldScrollY;
  oldScrollY = y;

  gsap.to($items, {
    skewX: -scrollSpeed * .2,
    rotate: scrollSpeed * .01,
    scale: 1 - Math.min(100, Math.abs(scrollSpeed)) * 0.003 });

};
render();