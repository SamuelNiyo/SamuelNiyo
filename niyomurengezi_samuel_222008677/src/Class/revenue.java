package Class;

public class revenue {

	
		private int id;
		private int amount;
		private int revenue_type;
		public revenue(int id, int amount, int revenue_type) {
			super();
			this.id = id;
			this.amount = amount;
			this.revenue_type = revenue_type;
		}
		public int getId() {
			return id;
		}
		public void setId(int id) {
			this.id = id;
		}
		public int getAmount() {
			return amount;
		}
		public void setAmount(int amount) {
			this.amount = amount;
		}
		public int getRevenue_type() {
			return revenue_type;
		}
		public void setRevenue_type(int revenue_type) {
			this.revenue_type = revenue_type;
		}
}