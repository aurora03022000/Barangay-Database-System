using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows;
using System.Windows.Controls;
using System.Windows.Data;
using System.Windows.Documents;
using System.Windows.Input;
using System.Windows.Media;
using System.Windows.Media.Imaging;
using System.Windows.Shapes;
using System.Data;
using System.Data.SqlClient;

namespace Barangay_CCT_Management_System
{
    /// <summary>
    /// Interaction logic for menuPage.xaml
    /// </summary>
    public partial class menuPage : Window
    {
        SqlConnection connection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True");

        public menuPage()
        {
            InitializeComponent();

        }

        private void Logout_btn_Click(object sender, RoutedEventArgs e)
        {
            loginPage loginPageWindow = new loginPage();
            loginPageWindow.Show();
            this.Close();
        }
    }
}
