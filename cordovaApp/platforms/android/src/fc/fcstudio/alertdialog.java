package fc.fcstudio;

import org.apache.cordova.CordovaPlugin;
import org.apache.cordova.CallbackContext;
import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;
import android.app.AlertDialog;
import android.content.DialogInterface;
import android.content.Context;
import android.os.Build;
import org.apache.cordova.PluginResult;

/**
 * This class echoes a string called from JavaScript.
 */
public class alertdialog extends CordovaPlugin {

	public Context context = null;
	private static final boolean IS_AT_LEAST_LOLLIPOP = Build.VERSION.SDK_INT >= 21;
	
    @Override
    public boolean execute(String action, JSONArray args, final CallbackContext callbackContext) throws JSONException {
		
		context = IS_AT_LEAST_LOLLIPOP ? cordova.getActivity().getWindow().getContext() : cordova.getActivity().getApplicationContext();
		String titulo = "";
		String mensagem = "";
		String textoBotao = "";
		
        if (action.equals("start")) {
			for (int i = 0; i < args.length(); i++) {
				JSONObject jsonobject = args.getJSONObject(i);
				titulo = jsonobject.getString("titulo");
				mensagem = jsonobject.getString("mensagem");
				textoBotao = jsonobject.getString("textobotao");
			}
            this.echo(titulo, mensagem, textoBotao, context);
			PluginResult pr = new PluginResult(PluginResult.Status.OK);
          	pr.setKeepCallback(true);
          	callbackContext.sendPluginResult(pr);
           	return true;
        }
		
		callbackContext.error("AlertDialog " + action + " is not a supported function.");
        return false;
    }

    public void echo(String titulo, String mensagem, String textoBotao, Context context) {
        			
		AlertDialog.Builder builder = new AlertDialog.Builder(context);
		builder.setTitle(titulo);
		builder.setMessage(mensagem);
		builder.setCancelable(true);
		//builder.setIcon(R.drawable.ic_menu_camera);
		builder.setNegativeButton(textoBotao, new DialogInterface.OnClickListener() {
			@Override
			public void onClick(DialogInterface dialog, int which) {
				dialog.cancel();
			}
		});
		AlertDialog alert = builder.create(); //create alertdialog
		alert.show();
    }
}
