;(function($){

    var exitmodals = [];
    var popupDisplayd = false; 
    var dealypopup = []; 

	$(document).ready(function(){

		PlainModal.closeByEscKey = false;
        PlainModal.closeByOverlay = false;
        var modalels = document.querySelectorAll(".modal-content");
        
        //var modals = [];
        for(i=0;i<modalels.length;i++){
        	
            var content = modalels[i];
            var modal = new PlainModal(content);
            var dealy = modalels[i].getAttribute("data-dealy");
            
            modal.closeButton = content.querySelector('.close-button');
            //modals[i].open();

            
            if(modalels[i].getAttribute("data-exit") == '1'){

                        if( dealy > 0 ){

                            dealypopup.push({modal:modal,dealy:dealy});
                            // setTimeout(function(){
                            //      modal.open(); 
                            // },dealy);


                    }else{
                         modal.open(); 
                    }
               


            }else{
                exitmodals.push(modal); 
            }

        }

        console.log(dealypopup);

        for( i in dealypopup ){
            setTimeout(function(i){
                dealypopup[i].modal.open();
            },dealypopup[i].dealy,i);
        }

	});

    if(exitmodals.length > 0 ){

        window.onbeforeunload = function(){
        if(!popupDisplayd){

                for( i in exitmodals ){

                exitmodals[i].open(); 

            }

            popupDisplayd = true; 

             return true; 

        }
        
       

    }


    }
    

})(jQuery); 

