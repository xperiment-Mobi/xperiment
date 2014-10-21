package AntlrStuff
{
	import com.xperiment.behaviour.BehaviourBoss;
	import com.xperiment.trial.Trial;
	
	public class TrialAntlr extends Trial
	{
		public function TrialAntlr()
		{
			super();
		}
		
		override public function manageBehavioursGet():BehaviourBoss{
			return new BehaviourBossAntlr(pic,CurrentDisplay);
		}
	}
}