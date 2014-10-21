package AntlrStuff
{
	import com.Start.WebStart.WebStart;
	import com.xperiment.runner.runner;
	
	import flash.display.Stage;
	
	public class WebStartAntlr extends WebStart
	{
		public function WebStartAntlr(theStage:Stage, scriptName:String='')
		{
			super(theStage, scriptName);
		}
		
		override public function exptPlatform():runner{
			return new runnerAntlr(theStage);
		}
	}
}