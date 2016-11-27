/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */




// validate empty string
function Empty(e) {
	switch (e) {
	    case "":
	    case 0:
	    case "0":
	    case null:
	    case false:
	    case typeof this == "undefined":
	      return true;
	    default:
	      return false;
  }
}