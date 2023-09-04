const widgetValueProposition = (el) => {
    return {
        init() {
            let $counter = el[0].querySelectorAll('.counter')

            $counter.forEach(el => {
                let od = new Odometer({
                    el: el,
                    value: '',
                    duration: 2000,
                });


                const callback = entries => {
                    entries.forEach( entry => {
                    
                    if ( entry.isIntersecting && ! el.classList.contains( 'is-visible' ) ) {

                        od.update(el.dataset.counter)
                        el.classList.add( 'is-visible' )
                    }
                    } )
                }
                

                let IO = new IntersectionObserver( callback, { threshold: .4 } )
                IO.observe( el )

                
            }); 
        }
    }
  }