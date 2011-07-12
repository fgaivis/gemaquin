@ECHO OFF
call cake migration all -plugin users -noclear;
call cake migration all -plugin categories -noclear;
call cake migration all -plugin business -noclear;
call cake migration all -plugin catalog -noclear;
call cake migration all -plugin orders -noclear;
call cake migration all -plugin inventory -noclear;
call cake migration all;
