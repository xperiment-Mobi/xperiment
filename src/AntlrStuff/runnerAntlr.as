package AntlrStuff
{
	import com.xperiment.runner.runner;
	import com.xperiment.trial.Trial;
	
	import flash.display.Stage;
	import com.xperiment.PythonScript.PScript;
	
	public class runnerAntlr extends runner
	{
		public function runnerAntlr(sta:Stage)
		{
			super(sta);
			PScript.init();
		}
		
		override public function newTrial():Trial{
			return new TrialAntlr();
		}
	}
}