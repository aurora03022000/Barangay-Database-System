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
using System.Windows.Navigation;
using System.Windows.Shapes;
using System.Text.RegularExpressions;
using System.Data.SqlTypes;
using System.Data.SqlClient;
using System.Data;

namespace Barangay_Information_Management_System
{
    /// <summary>
    /// Interaction logic for MainWindow.xaml
    /// </summary>
    public partial class loginPage : Window
    {
        String barangay_name;
        String username;
        int loginAttemptsInteger;

        public loginPage()
        {
            InitializeComponent();
        }



        SqlConnection connection = new SqlConnection("Data Source=LAPTOP-KQMHEG3A;Initial Catalog=famrec;Integrated Security=True");


        private void Button_Click(object sender, RoutedEventArgs e)
        {
            //Verifying Inputs of user
            string verifyUser = "SELECT * FROM table3 WHERE username=@username and password=@password";
            connection.Open();
            SqlCommand verifyUsercmd = new SqlCommand(verifyUser, connection);
            verifyUsercmd.Parameters.AddWithValue("@username", usernameTextbox.Text);
            verifyUsercmd.Parameters.AddWithValue("@password", passwordTextbox.Password);
            SqlDataAdapter verifyUserda = new SqlDataAdapter(verifyUsercmd);
            DataTable verifyUserdt = new DataTable();
            verifyUserda.Fill(verifyUserdt);

            SqlDataReader getUserDR = verifyUsercmd.ExecuteReader();

            if (getUserDR.Read())
            {
                username = getUserDR.GetValue(1).ToString();
                barangay_name = getUserDR.GetValue(3).ToString();
            }
            getUserDR.Close();
            connection.Close();

            if (verifyUserdt.Rows.Count > 0)
            {

                if(barangay_name != "")
                {
                    menuPage loginPageWindow = new menuPage();
                    loginPageWindow.Show();
                    this.Close();
                }

                else
                {
                    if(username == "admin")
                    {
                        menuPage loginPageWindow = new menuPage();
                        loginPageWindow.Show();
                        this.Close();
                    }

                    else
                    {
                        menuPage loginPageWindow = new menuPage();
                        loginPageWindow.Show();
                        this.Close();
                    }
                    
                }

               

            }

            else {
                errorLabel.Visibility = Visibility.Visible;
                usernameTextbox.Text = null;
                passwordTextbox.Password = null;
                usernameTextbox.BorderBrush = Brushes.Red;
                passwordTextbox.BorderBrush = Brushes.Red;
                usernameTextbox.Focus();
            }
        }
    }
}
