/*================================================================================
	Divas World
	Version: 5.0
	Author: Krazy IT
	Author URL: https://krazyit.com
	Developed By: Rumi (mrbd1012@gmail.com)
================================================================================

NOTE:
------
PLACE HERE YOUR OWN JS CODES AND IF NEEDED.
WE WILL RELEASE FUTURE UPDATES SO IN ORDER TO NOT OVERWRITE YOUR CUSTOM SCRIPT IT'S BETTER LIKE THIS. */
// showing toast message
function alertNormalToast(error){
    M.toast({html: error})
}
// logout from admin panel
function logout(current){
    current.preventDefault;
    document.getElementById('logout-form').submit();
}
